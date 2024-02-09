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

$department_name = isset($_POST['department_name']) ? $_POST['department_name'] : '';
$establishment_id = isset($_POST['establishment_id']) ? $_POST['establishment_id'] : '';

if (!empty($department_name) && !empty($establishment_id)) {
    try {
        $stmt = $conn->prepare("INSERT INTO departments (name_of_department, establishment_id) VALUES (:department_name, :establishment_id)");
        $stmt->bindParam(':department_name', $department_name);
        $stmt->bindParam(':establishment_id', $establishment_id);
        $stmt->execute();
        echo "تمت إضافة القسم بنجاح.";
    } catch (PDOException $e) {
        echo "خطأ: " . $e->getMessage();
    }
} else {
    echo "يرجى إدخال اسم القسم وتحديد المؤسسة.";
}

$conn = null;
?>
