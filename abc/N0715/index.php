<?php
    session_start();

    $result = "";

    if (!$_SESSION['username']){
        $_SESSION['error'] = "Bạn cần đăng nhập để sử dụng chức năng này";
        header("Location: bai3.php");
        exit();
    }
    else {
        $result = $_SESSION['username'];
    }
?>


<label> Cảm ơn bạn đã đăng ký, <b><?php  echo isset($_SESSION['username']) ? $result : '' ?> </b></label>