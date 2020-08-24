<?php

//Khai báo thông tin kết nối tới database

$host_name = "localhost";
$username = "root"; // mặc định root
$password = "root"; //MAMP mặc định
$db_name = "asm";
$db_port = "3306";

//tạo kết nối đến DB
$connection = new mysqli (
    $host_name,
    $username,
    $password, 
    $db_name,
    $db_port
);
?>

