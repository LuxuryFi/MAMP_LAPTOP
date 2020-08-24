<?php
// khởi tạo session
session_start();
//khơi tạo giá trị cho biến SESSION array rỗng

$_SESSION = array();

unset($_SESSION);
session_destroy();

//CHuyenr hướng website về trang login
header("Location: ../index.php");
exit;