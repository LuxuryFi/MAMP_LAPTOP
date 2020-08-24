<?php
    require_once 'controllers/Controller.php';
    require_once 'models/User.php';

class UserController extends Controller {
    public function register(){

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        
        if(isset($_POST['register'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if (empty($username) || empty($password) || empty($confirm_password)){
                $this->error = "Không được để trống";
            }
            else if (strcmp($password,$confirm_password)){
                $this->error = "Mật khẩu không khớp";
            }
           
            //Kiểm tra xem username đã tồn tại trong bảng users chưa
            if (empty($this->error)){
                $user_model = new User();
                $is_username_exists = $user_model->isUsernameExist($username);

                if($is_username_exists){
                    $this->error = "Username đã tồn tại";
                }
                else {
                    $password = md5($password);
                    $user_model->password = $password;
                    $user_model->username = $username;
                    $is_register = $user_model->register($username,$password);

                    if($is_register){
                        header("Location: index.php?controller=user&action=login");
                        exit();
                    }
                    else {
                       // $this->error = "Không thể đăng ký";
                    }
                }
            }

        }

        $this->title_page = "Trang đăng ký User";
        $this->content = $this->render('views/users/register.php');
        require_once 'views/layouts/main_login.php';
    }

    public function login(){
    
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        if (isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)){
                $this->error = 'Phải đăng nhập cả 2 trường';    
            }

            if (empty($this->error)){
                $user_model = new User();
                $password = md5($password);
                $user = $user_model->getUser($username,$password);


                if (!empty($user)){
                    $SESSION['user'] = $user;
                    $SESSION['success'] = 'Đăng nhập thành công';
                    header("Location: index.php?controller=product");
                    exit();
                }
                //Do cần hiển thị thông tin user sau khi login thành công nên kết quả
                //trả về sau khi xử lý hàm getUser sẽ là 1 mảng
                
            }
        }
        $this->title_page = 'Trang đăng nhập';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }
}

?>