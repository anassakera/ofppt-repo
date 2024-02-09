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

if (!empty($establishment_name)) {
    try {
        $stmt = $conn->prepare("INSERT INTO establishments (name_of_Establishment) VALUES (:establishment_name)");
        $stmt->bindParam(':establishment_name', $establishment_name);
        $stmt->execute();
        echo "تمت إضافة المؤسسة بنجاح.";
    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} else {
    echo "يرجى إدخال اسم المؤسسة.";
}

$conn = null;
?>
