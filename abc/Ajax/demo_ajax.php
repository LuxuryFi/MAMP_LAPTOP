<?php
// demo_ajax/create.php
// Ajax có thể chạy trc các chức năng khác
// Bình thường với 1 web như PHP thuần thì sẽ theo cơ chế đồng bộ
// Chức năng nào gọi trc sẽ chạy trc, và các chức năng sau phải
// chờ, chức năng trc đó chạy xong thì nó mới đc chạy
// Ajax có cơ chế lấy dữ liệu mà ko tải lại trang. 
// Các framework JS như Node, Angular, React đều sử dụng cơ chế tương tự

//Thay vì dung js thuần để gọi ẫ thì sẽ sử dụng thu viện Jquery thay thể để cho đơn giản
//

//DEMO ỨNG DỤNG THÊM DỮ LIỆU VÀO BẢNG categories CỦA DB DAY22 use Ajax



?>

    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript" > </script>






Nhập tên: 
<input type="text" name="name" id="name" value="">
<br>

Nhập mô tả:
<textarea id="description" name="" id="" cols="30" rows="10"></textarea>
<br>

<button id="save">Lưu</button>

