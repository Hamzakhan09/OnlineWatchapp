<?php
$server = "Localhost";
$username = "root";
$password = "";
$database = "time_zone";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    echo "<script>alert('OOPs DB Connection Failed...!');</script>";
}
?>