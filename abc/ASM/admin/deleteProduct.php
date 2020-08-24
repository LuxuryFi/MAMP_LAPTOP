<?php
    require_once "dbconnect.php";
    require_once "adminRole.php";
    $id = $_POST['id'];
//id bên trái A đặt tên gì cũng đc
//id bên phải B tên thuộc tính name ở nút submit của DELETE
//Cần chú ý gõ đúng tên để có thể nhận giá trị
// tạo câu lệnh truy vấn để xóa dữ llieuej
    $sql = "DELETE FROM product WHERE productid = '$id'";
    //id la tên cột trong bảng student

    $rs = $connection->query($sql);
    if ($rs ) { ?>
        <script>
           alert("Delete product successfullly"); 
           window.location.href = "manageProduct.php";
        </script> 
    <?php }
    else { ?>
        <script>
           alert("Delete failed"); 
           window.location.href = "manageProduct.php";
        </script> 
    <?php } 

    //ĐIều hướng của php: 
    // header("Location: ASM2.php")
?>
