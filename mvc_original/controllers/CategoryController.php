<?php
require_once "controllers/Controller.php";
require_once "models/Category.php";

//Tạo class phải trùng với tên file
class CategoryController extends Controller {
    public function create(){
        $this->content = $this->render('views/categories/create.php');
        // Gọi layout để hiện thị nội dung của view vừa lấy
        require_once 'views/layouts/main.php';

    }
}