<?php
// Connect to database 
$con = mysqli_connect("localhost", "root", "", "mydatabase");

// Get all the classes from classes table
$sql_classes = "SELECT * FROM `classes`";
$sql_establishments = "SELECT * FROM `establishments`";
$all_classes = mysqli_query($con, $sql_classes);
$all_establishments = mysqli_query($con, $sql_establishments);
?>