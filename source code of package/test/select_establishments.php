<?php
// Connect to database 
$con = mysqli_connect("localhost", "root", "", "mydatabase");

// Get all the establishments from establishments table
$sql_establishments = "SELECT * FROM `establishments`";
$all_establishments = mysqli_query($con, $sql_establishments);
?>
