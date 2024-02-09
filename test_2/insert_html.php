<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة مؤسسة وقسم</title>
</head>
<body>

<h2>إضافة مؤسسة</h2>
<form action="insert.php" method="post">
    <label for="name">اسم المؤسسة:</label>
    <input type="text" name="name" required>
    <button type="submit">إضافة مؤسسة</button>
</form>

<h2>إضافة قسم</h2>
<form action="insert.php" method="post">
    <label for="establishment">اختر المؤسسة:</label>
    <!-- استخدم select لاختيار المؤسسة -->
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
    
    <label for="class_name">اسم القسم:</label>
    <input type="text" name="class_name" required>
    
    <button type="submit">إضافة قسم</button>
</form>

</body>
</html>
