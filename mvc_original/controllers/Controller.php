<?php

//ĐÓng vai trò là 1 class cha để tất cả cá controller còn lại đều kế thừa
// từ class này
class Controller {
    public $content;
    public $error;
    public $title_page;

    public function __construct(){
        //Kiểm tra nếu user chưa đăng nhập thì ko cho phép truy
        //cập các chức năng
        // if((!isset($_SESSION['user'])) && $_GET['controller'] != 'user'){
        //     $_SESSION['error'] = 'Bạn cần đăng nhập';
        //     header("Location: index.php?controller=user&action=login");
        //     exit();
        // }
        
    }
   
    // có thể khai báo thêm các thuộc tính về SEO
    
    //phương thức lấy nội dung động dựa vào đường dẫn tới view
    public function render($view_path, $variable = []){
        extract($variable);

        //tạo vùng đệm để bắt đầu chưa nội dung file
        ob_start();

        // + Nhúng file view vào
        require_once "$view_path";

        //+ kết thúc việc lấy nội dung file, sau khi lấy xong sẽ xóa vùng đệm bân đầu đi

        $render_view = ob_get_clean();

        return $render_view;
    }
}



?>