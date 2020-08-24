<?php
// khởi tạo session
session_start();
//khơi tạo giá trị cho biến SESSION array rỗng

session_destroy();

//CHuyenr hướng website về trang login
header("Location: index.php");
exit;
