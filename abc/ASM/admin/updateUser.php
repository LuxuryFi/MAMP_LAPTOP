<?php

require_once "dbconnect.php";

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $oldimage = $_POST['oldimage'];
    
    
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
        $image = $username.".".$extension;
        //B7: thiết lập đường dẫn mới cho ảnh trong web project
        $image_folder = "figure/";
        $destination = $image_folder . $image;
        $moveto = "../".$destination;
        //B8: di chuyển ảnh từ đường dẫn tạm thời đến đường dẫn mới
        
        move_uploaded_file($temp_name, $moveto);
    } else {
            $destination = $oldimage;
    }

    
    $oldpw = $_POST['oldpw'];
    $newpw = $_POST['newpw'];
    $newpw1 = $_POST['newpw1'];
    
    
    if ($newpw == $newpw1 && ($newpw != '' && $newpw1 != '')){ 
        $password = $newpw;
    }
    else {
        $password = $oldpw;
    }

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $role = 2;
    
    $sql3 = "UPDATE userLogin SET password = '$password',fullname ='$fullname',phone ='$phone',email ='$email',role = '$role',image = '$destination' where username = '$username'";

    $regis = $connection->query($sql3);
   
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="ASM2.css?v=<734>" type="text/css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/ASM2.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagechange')
                        .attr('src', e.target.result)
                        .width(400);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>

<body>
    <?php require_once "header.php" ?>
    <div id="inputgrid">
        <main class="background box">
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset id="inputfield2">
                        <legend>Update information</legend>
                        <?php 
                        if(isset($_POST['username'])){
                            $username = $_POST['username'];
                        }
                        if(isset($_GET['username'])){
                            $username = $_GET['username'];
                        }

                            $getinfo = "SELECT * from userLogin WHERE username='$username'";
                            $runinfo = $connection->query($getinfo);
                            $info = mysqli_fetch_array($runinfo);
                        
                        ?>
                        <table class="inputtable">
                            <tr>
                                <td class="formlabel">
                                    <label for="username">Username</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" readonly value="<?=$info[0]?>" name="username" required placeholder="Enter username" maxlength="50" size="55">
                                    </div>
                                </td>
                                <td id="formimage" rowspan="6"><img id="imagechange"  src="../<?=$info[6]?>" alt=""></td>

                            </tr>

                            <tr>
                                <td class="formlabel">
                                    <label for="fullname">Full name</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input value="<?=$info[2]?>" type="text" name="fullname" required placeholder="Enter your name" maxlength="50" size="55">
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="pw">Password</label>
                                </td>
                                <td class="formtext">
                                    <input value="<?=$info[1]?>" type="text" placeholder="Enter your password" id="pw" name="pw" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="pw">New Password</label>
                                </td>
                                <td class="formtext">
                                    <input  type="password" placeholder="Enter your password" id="newpw" name="newpw" maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="pw">Re-enter New Password</label>
                                </td>
                                <td class="formtext">
                                    <input  type="password" placeholder="Enter your password" id="newpw1" name="newpw1"  maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="phone">Phone</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" value="<?=$info[3]?>" name="phone" required placeholder="Enter your phone number" maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="email">Email</label>
                                </td>
                                <td class="formtext">
                                    <input id="email" value="<?=$info[4]?>" type="text" name="email" required placeholder="Enter your email address" maxlength="50" size="55">
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
                                    <input type="submit" value="UPDATE" name="update" data-submit="...Sending">
                                    <input type="hidden" name="oldimage" value="<?=$info[6]?>">
                                    <input type="hidden" value="<?=$info[0]?>" name="username">
                                    <input type="hidden" value="<?=$info[1]?>" name="oldpw">
                                    <input type="button" value="CLEAR" name="clear">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </main>
        <figure class="box"></figure>
        <aside class="background box">
            <?php if (isset($user)){ 
					if ($user['role'] < 2) { ?>
                        <nav id="sidenav">
                <ul class="inputoption">
                    <li class="inputoption1"><span class="inputhover"><a href="addProduct.php">Add Product</a></span>
                    </li>
                    <li class="inputoption2"><span class="inputhover"><a href="addSupplier.php">Add Supplier</a></span>
                    </li>
                    <li class="inputoption3"><span class="inputhover"><a href="manageProduct.php">Manage
                                Product</a></span></li>
                    <li class="inputoption4"><span class="inputhover"><a href="manageSupplier.php">Manage
                                Supplier</a></span></li>
                    <li class="inputoption4"><span class="inputhover"><a href="manageUser.php">Manage User</a></span>
                    </li>
                    <li class="inputoption5"><span class="inputhover"><a href="acceptOrder.php">Manage Order</a></span></li>
                </ul>
            </nav>
                    

            <?php } 
        }?>
            
        </aside>
        <?php require_once "bottom.php"?>
    </div>
</body>

</html>

