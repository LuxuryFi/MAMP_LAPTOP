<?php
session_start();
//mvc_demo/index.php
//file index gốc của ứng dụng

// bất cứ 1 mô ình mvc nào cũng phải có 
// Tên file luôn là index.php
// Khi code mô hình MVC, code file index gốc đầu tiên
// Mục đích của file này sẽ đón tất cả các request từ user gửi lên và nó sẽ sử lý 
// để gọi đúng controller tương ứng.
// Về mặt code, cần phân tích url
// URL trong MVC là do các bạn tự quyết định
// Và với mô hình MVC trong khóa học thì url luôn có định dạng như sau::
/*
    index.php?controller=<tên-controller>&action<tên phương thức tương ứng>&.....
    file index gốc sẽ phân tích url trên, lây đc controller và action tương ứng
    nhúng file chứ class controller này sau đó khởi tạo
    đối tượng từ class này , lấy đối tượng đó gọi đến phương thức action bắt được từ url
    VD: url thêm mới danh mục
    //index.php?controller=category&action=create


    Bắt ĐẦU CODE 
    - Set múi giờ mặc định cho hệ thống

*/

date_default_timezone_set('Asia/Ho_Chi_Minh');

// Phan tich url để lấy ra controller và action

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'category';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// - Phân tích giá trị của controller, chuyển đổi giá trị này thành đúng tên file chứa controller tương ứng.

$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
// - Tạo biến khác để nối thêm chuỗi .php vào dùng để nhúng ile
$controller_file = $controller.".php";
// Nhứng file trên hệ thông chú ý trong mô hình MVC mọi đường dẫn khi nhúng file đều phải tư duy đứng từ file index của ứng dụng để nhúng

$path_controller = "controllers/$controller_file";
// kiểm tra đường dẫn trên tồn tại thì mới nhúng, nếu ko thì sẽ báo Not Found

if(!file_exists($path_controller)){
    die("Cannot be found");
}
require_once "$path_controller";
//sau khi nhúng thành công file controller tương ứng
// Chắc chắn đã có class tương ứng, khởi tạo đối tượng từ class đó

$object = new CategoryController();
//Kiểm tra nếu tồn tại phương tháp trong class trên thì mới gọi còn ko thì sẽ die luôn

if(!method_exists($object,$action)){
    die("Không tồn tại phương thức $action trong class $controller");
}

$object->$action();

?>
