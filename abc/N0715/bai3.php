<?php
    session_start();
    $error = "";
    $result = "";

    if (isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];

        if (empty($username) || empty($name) || empty($password)){
            $error = "Không được để trống";
        }

        if (empty($error)){
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<form action="" method="POST">
        <table>
            <tr>
                <th class="blue" colspan="2">Form đăng ký</th>
            </tr>
            <tr>
                <td>Nhập username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Nhập họ tên</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Nhập password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" name="submit" value="Đăng ký">
                    <input type="clear" value="Nhập lại">
                </throw>
            </tr>
        </table>
    </form>
    <h2><?php echo $error?></h2>
</body>
</html>