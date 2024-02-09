<?php
$host = "localhost";
$db = "mydatabase";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$establishmentId = isset($_GET['establishment_id']) ? $_GET['establishment_id'] : 0;

$sql = "SELECT * FROM classes WHERE establishment_id = " . $establishmentId;
$result = mysqli_query($conn, $sql);

$classes = array();

while ($row = mysqli_fetch_assoc($result)) {
    $classes[] = array(
        'id' => $row['id'],
        'name_of_class' => $row['name_of_class']
    );
}

mysqli_close($conn);

echo json_encode($classes);
?>
