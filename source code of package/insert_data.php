<?php
$host = "localhost";
$db = "mydatabase";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage());
}

$establishment_name = isset($_POST['establishment_name']) ? $_POST['establishment_name'] : '';
$class_name = isset($_POST['class_name']) ? $_POST['class_name'] : '';

if (!empty($establishment_name)) {
    try {
        // التحقق من عدم وجود قيمة مكررة في جدول Establishments
        $check_duplicate_stmt = $conn->prepare("SELECT COUNT(*) FROM Establishments WHERE name_of_Establishment = :establishment_name");
        $check_duplicate_stmt->bindParam(':establishment_name', $establishment_name);
        $check_duplicate_stmt->execute();
        $count = $check_duplicate_stmt->fetchColumn();

        if ($count > 0) {
            echo "البيانات موجودة بالفعل في جدول Establishments.";
        } else {
            // إدراج البيانات في جدول Establishments
            $stmt_establishments = $conn->prepare("INSERT INTO Establishments (name_of_Establishment) VALUES (:establishment_name)");
            $stmt_establishments->bindParam(':establishment_name', $establishment_name);
            $stmt_establishments->execute();
            echo "تمت إضافة البيانات إلى جدول Establishments بنجاح.";
        }
    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} elseif (!empty($class_name)) {
    try {
        // التحقق من عدم وجود قيمة مكررة في جدول Classes
        $check_duplicate_stmt = $conn->prepare("SELECT COUNT(*) FROM Classes WHERE name_of_Class = :class_name");
        $check_duplicate_stmt->bindParam(':class_name', $class_name);
        $check_duplicate_stmt->execute();
        $count = $check_duplicate_stmt->fetchColumn();

        if ($count > 0) {
            echo "البيانات موجودة بالفعل في جدول Classes.";
        } else {
            // إدراج البيانات في جدول Classes
            $stmt_classes = $conn->prepare("INSERT INTO Classes (name_of_Class) VALUES (:class_name)");
            $stmt_classes->bindParam(':class_name', $class_name);
            $stmt_classes->execute();
            echo "تمت إضافة البيانات إلى جدول Classes بنجاح.";
        }
    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} else {
    echo "يرجى إدخال قيم صحيحة.";
}

// إغلاق الاتصال
$conn = null;
?>
