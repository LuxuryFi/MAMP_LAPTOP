<?php

session_start();

require_once "dbconnect.php";
// kiểm tra xem nguòi dùng đã login hay chưa
// có thể thực hinej các thao tác trong admin site
// nếu chưa login => báo lỗi

/* kiểm tra xem người dùng đã login hay chưa trước khi
có thể thực hiện các thao tác trong admin site */
// nếu chưa login => redirect về trang login 
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: index.php");
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM userLogin WHERE username = '" . $_SESSION['username'] . "' AND password = '" . $_SESSION['password'] .  "'";

$run = $connection->query($sql);

$user = mysqli_fetch_array($run, MYSQLI_ASSOC);
