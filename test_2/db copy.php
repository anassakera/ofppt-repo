<?php
// to connect mydatabase
$con=new mysqli('localhost','root','','mydatabase');
if(!$con){
    die(mysqli_error($con));
}
