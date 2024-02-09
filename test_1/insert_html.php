<!-- insert_html.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مؤسسة جديدة أو قسم جديد</title>
</head>
<body>
    <h2>إضافة مؤسسة جديدة</h2>
    
    <!-- نموذج HTML لإرسال البيانات إلى صفحة insert.php -->
    <form action="insert.php" method="post">
        <label for="name">اسم المؤسسة:</label>
        <input type="text" name="name" required>
        <br>
        <input type="submit" value="إضافة مؤسسة">
    </form>

    <h2>إضافة قسم جديد</h2>
    
    <!-- نموذج HTML لاختيار اسم المؤسسة وإضافة قسم -->
    <form action="insert.php" method="post">
        <label for="establishment">اختر إسم المؤسسة:</label>
        <select name="establishment" required>
            <?php
            // تضمين ملف الاتصال بقاعدة البيانات
            include 'db.php';

            // استعداد الاستعلام لاسترجاع جميع أسماء المؤسسات
            $getEstablishmentsQuery = "SELECT * FROM establishments";
            $establishments = $pdo->query($getEstablishmentsQuery);

            // عرض أسماء المؤسسات في القائمة المنسدلة
            foreach ($establishments as $establishment) {
                echo "<option value='" . $establishment['id'] . "'>" . $establishment['name_of_establishments'] . "</option>";
            }
            ?>
        </select>
        <br>

        <!-- إضافة حقل لإدخال اسم القسم -->
        <label for="class_name">اسم القسم:</label>
        <input type="text" name="class_name" required>
        <br>

        <input type="submit" value="إضافة قسم">
    </form>
</body>
</html>
