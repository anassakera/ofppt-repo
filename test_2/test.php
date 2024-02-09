قم بدمج الشيفرة التالية وسمها insert.php

<!-- insert.php -->

<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db.php';

// التحقق من الطريقة المستخدمة للوصول إلى هذه الصفحة (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من وجود قيمة لاسم المؤسسة واسم القسم
    if (isset($_POST['establishment']) && isset($_POST['class_name'])) {
        // تنظيف وتحضير بيانات اسم المؤسسة واسم القسم
        $establishmentId = htmlspecialchars($_POST['establishment']);
        $className = htmlspecialchars($_POST['class_name']);

        // التحقق من عدم تكرار نفس المدخلات
        $checkDuplicate = $pdo->prepare("SELECT * FROM classes WHERE name_of_class = :class_name AND establishment_id = :establishment_id");
        $checkDuplicate->bindParam(':class_name', $className);
        $checkDuplicate->bindParam(':establishment_id', $establishmentId);
        $checkDuplicate->execute();

        if ($checkDuplicate->rowCount() > 0) {
            // إذا وُجد تكرار في البيانات، يمكنك تنفيذ إجراء مناسب، مثل إظهار رسالة خطأ
            echo "هذا الاسم موجود بالفعل!";
        } else {
            // استعداد الاستعلام لإدراج بيانات القسم في قاعدة البيانات
            $sql = "INSERT INTO classes (name_of_class, establishment_id) VALUES (:class_name, :establishment_id)";
            
            // تحضير وتنفيذ الاستعلام باستخدام PDO
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':class_name', $className);
            $stmt->bindParam(':establishment_id', $establishmentId);

            try {
                // تنفيذ الاستعلام
                $stmt->execute();

                // رسالة نجاح
                echo "تمت إضافة القسم بنجاح!";
            } catch (PDOException $e) {
                // في حالة حدوث أي خطأ أثناء الإدراج، يمكنك معالجته هنا
                echo "فشل في إضافة القسم: " . $e->getMessage();
            }
        }
    } else {
        // إذا لم يتم إرسال قيمة لاسم المؤسسة أو اسم القسم، يتم توجيه المستخدم للصفحة السابقة أو صفحة أخرى
        header("Location: insert_html.php");
        exit();
    }
} else {
    // إذا كان الوصول إلى هذه الصفحة ليس عبر POST، يتم توجيه المستخدم للصفحة الرئيسية أو صفحة أخرى
    header("Location: index.html");
    exit();
}
?>


<!-- insert.php -->

<?php
// تضمين ملف الاتصال بقاعدة البيانات
include 'db.php';

// التحقق من الطريقة المستخدمة للوصول إلى هذه الصفحة (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // التحقق من وجود قيمة لاسم المؤسسة
    if (isset($_POST['name'])) {
        // تنظيف وتحضير بيانات اسم المؤسسة
        $name = htmlspecialchars($_POST['name']);

        // التحقق من عدم تكرار نفس المدخلات
        $checkDuplicate = $pdo->prepare("SELECT * FROM establishments WHERE name_of_establishments = :name");
        $checkDuplicate->bindParam(':name', $name);
        $checkDuplicate->execute();

        if ($checkDuplicate->rowCount() > 0) {
            // إذا وُجد تكرار في البيانات، يمكنك تنفيذ إجراء مناسب، مثل إظهار رسالة خطأ
            echo "هذا الاسم موجود بالفعل!";
        } else {
            // استعداد الاستعلام لإدراج بيانات المؤسسة في قاعدة البيانات
            $sql = "INSERT INTO establishments (name_of_establishments) VALUES (:name)";
            
            // تحضير وتنفيذ الاستعلام باستخدام PDO
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);

            try {
                // تنفيذ الاستعلام
                $stmt->execute();

                // رسالة نجاح
                echo "تمت إضافة المؤسسة بنجاح!";
            } catch (PDOException $e) {
                // في حالة حدوث أي خطأ أثناء الإدراج، يمكنك معالجته هنا
                echo "فشل في إضافة المؤسسة: " . $e->getMessage();
            }
        }
    } else {
        // إذا لم يتم إرسال قيمة لاسم المؤسسة، يتم توجيه المستخدم للصفحة السابقة أو صفحة أخرى
        header("Location: test1.html");
        exit();
    }
} else {
    // إذا كان الوصول إلى هذه الصفحة ليس عبر POST، يتم توجيه المستخدم للصفحة الرئيسية أو صفحة أخرى
    header("Location: test1.html");
    exit();
}
?>
