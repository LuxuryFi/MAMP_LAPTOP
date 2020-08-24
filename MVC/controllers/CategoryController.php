<?php
//mvc_demo/controllers/CategoryController.php
//Class controller quản lý danh mục

//Nhúng model Category trên đầu file để tất cả các phương thức khác của classs đều sử dụng đc
require_once 'models/Category.php';

class CategoryController {
    //Khai 1 báo thuộc tính để thể thiện cho một nội dung động của từng view
    public $content;
    public $error = '';
    public $result = '';

    public function index(){
        $category_model = new Category();
        $categories = $category_model->getAll();


        $arr_view = [
            //key của phần tử chính là tên biến mà view sẽ sử dụng
            'categories_view' => $categories
        ];
        $this->content = $this->render('views/categories/index.php',$arr_view);
        require_once 'views/layouts/main.php';








    }

    public function create(){
        //Xử lý form, do action của form đang để rỗng nên chính URL hiện tại sẽ xử lý form

        //xử lý submit form, vị trí của nó cần đứng trước phần hiển thị view.

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $amount = $_POST['amount'];

            if (empty($name) || empty($amount)){
                $this->error = 'Must enter name and amount';
                //echo "<script>alert('Need to enter all information');</script>";
            }
            // Xử lý dữ liệu vào bảng categories chỉ khi không có lỗi
            if (empty($this->error)){
               
                // Theo đúng mô hình MVC, gọi model để insert vào DB chứ ko lưu trực tiếp tại đây
                $category_model = new Category();
                //Gán các giá trị từ form cho thuộc tính của model
                $category_model->amount = $amount;
                $category_model->name = $name;
                $is_insert = $category_model->insert();
                var_dump($is_insert);

                if($is_insert){
                    $_SESSION['success'] = "Thêm mới thành công";
                    header("Location: index.php?controller=category&action=index");
                }
                else {
                    $this->error = "Thêm mới thất bại";
                }
            }
        }

        $this->content = $this->render('views/categories/create.php');
        
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: index.php");
            exit();
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $category = $category_model->getOne($id);

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $amount = $_POST['amount'];

            if (empty($name) || empty($amount)){
                $this->error = "Cần nhập đủ các trường";
            }
            else if (!is_numeric($amount)){
                $this->error = "Amount phải là số";
            }

            if (empty($this->error)){
                $category_model = new Category();
                $category_model->name = $name;
                $category_model->amount = $amount;
                $category_model->id = $id;
                $is_update = $category_model->update($id);

                if($is_update){
                    $_SESSION['success'] = "Update thành công";
                    header("Location: index.php?controller=category&action=index");
                }
                else {
                    $this->error = "Update thất bại";
                }
            }
        }

        $this->content =  $this->render('views/categories/update.php', ['category' => $category]);
        require_once 'views/layouts/main.php';

    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: index.php");
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $is_delete = $category_model->delete($id);

        if($is_delete){
            $_SESSION['success'] = "Delete thành công";
            header("Location: index.php?controller=category&action=index");
        }
        else {
            $this->error = "Update thất bại";
        }
    }

    public function detail(){
        

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: index.php");
        }
        $id = $_GET['id'];
        $category_model = new Category();
        $category = $category_model->getOne($id);

        $arr_view = [
            //key của phần tử chính là tên biến mà view sẽ sử dụng
            'category' => $category
        ];

        $this->content =  $this->render('views/categories/detail.php',$arr_view);
        require_once 'views/layouts/main.php';
    }
    //Phương thức lấy nội dung view động, dựa vào đường dẫn tới file view đó
    // + file đường dẫn tới file muốn lấy.
    // $variables mảng kết hợp chưa các biết muốn sử dụng ở file view tương ứng.
    public function render($file, $variables = []){
        $render_view = '';
        //Khi muốn sử dụng biến từ bên ngoài trong view
        //cần sử dụng hàm sau
        extract($variables);
        //+ Sử dụng hàm sau để ghi nhớ việc đọc nội dung view
        /// ghi nhớ và lưu tạm vào bộ nhớ.
        ob_start();
        //Gọi view vào để lấy nội dung
        require_once "$file";
        // kết thúc việc đọc nội dung file

        $render_view = ob_get_clean();

        return $render_view;
    }
}