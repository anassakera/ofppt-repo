<?php
// Test from anass
// اتصال بقاعدة البيانات
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

// استقبال البيانات من النموذج
$establishment_name = isset($_POST['establishment_name']) ? $_POST['establishment_name'] : '';

// تحقق من عدم فراغ القيم
if (!empty($establishment_name)) {
    try {
        
        // إدراج البيانات في جدول Establishments
        $stmt_establishments = $conn->prepare("INSERT INTO Establishments (name_of_Establishment) VALUES (:establishment_name)");
        $stmt_establishments->bindParam(':establishment_name', $establishment_name);
        $stmt_establishments->execute();
        echo "تمت إضافة البيانات إلى جدول Establishments بنجاح. ";
    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} else {
    echo "يرجى إدخال قيم صحيحة.";
}

// إغلاق الاتصال
$conn = null;
?>
