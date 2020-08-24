<?php

require_once "adminRole.php";


require_once "dbconnect.php";

$id = $_POST['id'];

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $oldimage = $_POST['oldimage'];
    $name = $_POST['name'];
    $oldname = $_POST['oldname'];
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
        $image = $name.".".$extension;
        //B7: thiết lập đường dẫn mới cho ảnh trong web project
        $image_folder = "figure/";
        $destination = $image_folder . $image;
        $moveto = "../".$destination;
        //B8: di chuyển ảnh từ đường dẫn tạm thời đến đường dẫn mới

        move_uploaded_file($temp_name, $moveto);
    }
    else {    
        $destination = $oldimage;
    }

    $supplier = $_POST['supplier'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    if ($name != $oldname){
        $duplicatename = "SELECT * from product where productname = '$name'";
    }

    if(isset($duplicatename)){
        $runcheck = $connection->query($duplicatename);
    }
    

    if (isset($runcheck->num_rows) && $runcheck->num_rows>0) { ?>
        <script>
            alert("This product has already exist!");
            window.location.href = "manageProduct.php";
        </script>
        <?php } else {
            $updateproduct = "UPDATE product SET productname = '$name',productimage = '$destination',supplierid = '$supplier',categoryid = '$category',price = '$price' WHERE productid = '$id'";
            $runcode = $connection->query($updateproduct);
        }

        if ($runcode) { ?>
            <script>
                alert("Successful");
                window.location.href = "manageProduct.php";
            </script>
<?php   }
            ?>

<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../ASM2.css?v=<1111>" type="text/css">
    <link rel="stylesheet" href="../reset.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/ASM2.js"></script>
    
</head>

<body>
    <?php require_once "header.php" ?>
    <div id="inputgrid">
        <main class="background box">
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset id="inputfield2">
                        <legend>Update Product</legend>
                        <table class="inputtable">
                            <input type="hidden" <?php 
                                $id = $_POST['id'];
                                $sql4 = "SELECT * FROM product where productid = '$id'";
                                $sql1 = "SELECT * from supplier";
                                $run1 = $connection->query($sql1);
                                $sql2 = "SELECT * from category";
                                $run2 = $connection->query($sql2);
                                $run3 = $connection->query($sql4);
                                $getinfo = mysqli_fetch_array($run3);
                            ?> 
                            
                            <tr>
                            <td class="formlabel">
                                <label for="companyname">Product Name</label>
                            </td>
                            <td class="formtext">
                                <div>
                                    <input type="text" name="name" value="<?=$getinfo[1]?>" required
                                        placeholder="Enter product name" maxlength="50" size="55">
                                </div>
                            </td>
                            <td id="formimage" rowspan="5"><img id="imagechange" src="../<?=$getinfo[2]?>" alt=""></td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="price">Price</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" placeholder="Enter price of product" value="<?=$getinfo[5]?>"
                                        id="price" name="price" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Company Name</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <select name="supplier" id="">
                                            <?php while($supplier = mysqli_fetch_array($run1)){ 
                                                if ($getinfo[3] == $supplier[0]) { ?>
                                            <option value="<?=$supplier[0]?>" selected><?=$supplier[1]?></option>
                                            <?php } 
                                                else {?>
                                            <option value="<?=$supplier[0]?>"><?=$supplier[1]?></option>
                                            <?php } 
                                             } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Category</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <select name="category" id="">
                                            <?php while($category = mysqli_fetch_array($run2)){ 
                                            if ($getinfo[4] == $category[0]) { ?>
                                            <option value="<?=$category[0]?>" selected><?=$category[1]?></option>
                                            <?php } 
                                            else { ?>
                                            <option value="<?=$category[0]?>"><?=$category[1]?></option>
                                            <?php } 
                                            }?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Image</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type='file' id="imageadd" onchange="readURL(this);" accept="image/*"name="image">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formbtn" colspan="3">
                                    <input type="submit" value="UPDATE" name="update" data-submit="...Sending">
                                    <input type="hidden" name="id" value="<?=$getinfo[0] ?>">
                                    <input type="hidden" name="oldimage" value="<?=$getinfo[2]?>">
                                    <input type="hidden" name="oldname" value="<?=$getinfo[1]?>">
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
                </ul>
            </nav>
        </aside>
        <?php require_once "bottom.php"?>
    </div>
</body>

</html>
