<?php
require_once "dbconnect.php";




if (isset($_POST['add'])) {
    $username = $_POST['username'];
    //Quan trọng xử lý ảnh
    $image = "";

    //   B0: Kiểm tra xem người dùng đã chọn ảnh chưa và file ảnh  
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        //B1: khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
        //[1]: tên của biến, [2]: từ khóa
        $temp_name = $_FILES['image']['tmp_name'];
        //B2: khai báo biến đùng để lưu tên của ảnh
        $image_name = $_FILES['image']['name'];
        //B3: tách tên file dựa vào dấu chấm (phân chia tên file & đuôi)
        $parts = explode(".", $image_name);
        //B4: tìm ra index cuối cùng
        $lastIndex = count($parts) - 1;
        //B5: lấy ra kiểu dữ liệu của ảnh (đuôi - extension)
        $extension = $parts[$lastIndex];
        //B6: thiết lập name format cho ảnh (đặt tên mới cho ảnh)
        $image = $username . "." . $extension;
        //B7: thiết lập đường dẫn mới cho ảnh trong web project
        $image_folder = "figure/";
        $destination = $image_folder . $image;
        $moveto = "../" . $destination;
        //B8: di chuyển ảnh từ đường dẫn tạm thời đến đường dẫn mới
        move_uploaded_file($temp_name, $moveto);
    }


    $name = $_POST['name'];
    $phonepost = $_POST['phone'];
    $email = $_POST['email'];
    $role = 2;

    //validate password 


    if ($_POST['pw'] == $_POST['pw1']) {
        $password = $_POST['pw'];
    } else { ?>
        <script>
            alert('Your password is not matching');
        </script>
    <?php }

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 10) { 
        $validatepassword = false;   ?>
        <script>
            alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';");
        </script>
    <?php } else { ?>
        <script>
            alert("Strong password");
        </script>
    <?php $validatepassword = true;
    }

    //validate email



    $validate_email = filter_var($email, FILTER_VALIDATE_EMAIL); //[A-Z,a-z,1-9][\@][[A-Z,a-z,1-9]
    if (!$validate_email) { ?>
        <script>
            alert("Email is invalid!");
        </script>
    <?php  }


    //validate phone number
    function validate_phone($phonecheck)
    {
        $filter = filter_var($phonecheck, FILTER_SANITIZE_NUMBER_INT);

        $phone_to_check = str_replace("-", "", $filter);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    //validate phone number
    $check = "SELECT * FROM userLogin WHERE phone = '$phonepost'";
    $runcheck = $connection->query($check);

    if ((validate_phone($phonepost) == true) && $runcheck  && (($runcheck->num_rows > 0) == false)) {
        $phone = filter_var($phonepost, FILTER_SANITIZE_NUMBER_INT);
    } else { ?>
        <script>
            alert("The phone number is invalid or in used - Please enter the correct phone number that 10-14 digit<?= $phonepost ?>");
            window.location.href = "createUser.php";
        </script>
    <?php }

    if (($validatepassword == true) && (validate_phone($phonepost) == true) && ($validate_email == true)) {

        $sql3 = "INSERT INTO userLogin (username,password,fullname,phone,email,role,image) VALUES('$username','$password','$name','$phone','$email','$role','$destination')";
        $regis = $connection->query($sql3);
    }

    if (isset($regis) && $regis == true) { ?>
        <script>
            alert("Register successfully - Please relogin");
            window.location.href = "../index.php";
        </script>
    <?php  } else { ?>
           <script>
               alert("1. <?=$email?> 2. <?=$password?> 3. <?=$phone?> 4. <?=$validatepassword?>");
           </script>     


<?php     }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../ASM2.css?v=<724>" type="text/css">
    <link rel="stylesheet" href="../reset.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/ASM2.js"></script>
</head>

<body>


    <div id="inputgrid">

        <main class="background">
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset id="inputfield2">
                        <legend>Create new account</legend>
                        <table class="inputtable">
                            <tr>
                                <td class="formlabel">
                                    <label for="username">Username</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" name="username" required placeholder="Enter username" maxlength="50" size="55">
                                    </div>
                                </td>
                                <td id="formimage" rowspan="6"><img id="imagechange" src="#" alt=""></td>

                            </tr>

                            <tr>
                                <td class="formlabel">
                                    <label for="username">Full name</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" name="name" required placeholder="Enter your name" maxlength="50" size="55">
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="pw">Password</label>
                                </td>
                                <td class="formtext">
                                    <input type="password" placeholder="Enter your password" id="pw" name="pw" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="pw">Re-enter password</label>
                                </td>
                                <td class="formtext">
                                    <input type="password" placeholder="Please re-enter your password" id="pw1" name="pw1" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="phone">Phone</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" name="phone" required placeholder="Enter your phone number" maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="email">Email</label>
                                </td>
                                <td class="formtext">
                                    <input id="email" type="text" name="email" required placeholder="Enter your email address" maxlength="50" size="55">
                                </td>
                            </tr>

                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Image</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type='file' id="imageadd" onchange="readURL(this);" accept="image/*" name="image">
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="formbtn" colspan="3">
                                    <input type="submit" value="REGISTER" name="add" data-submit="...Sending">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </main>
        <figure class="box"></figure>
        <aside class="background box">
            <nav id="sidenav">

            </nav>
        </aside>
        <?php require_once "bottom.php" ?>
    </div>
</body>

</html>
