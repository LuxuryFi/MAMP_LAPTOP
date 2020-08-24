<?php 
//models/Model.php
//Đóng vai trò là 1 class cha, chứa thuộc tính kết nối để các class con kế thừa
// từ nó có thể sử dụng
require_once 'configs/Database.php';

class Model {
    public $connection;

    //tận dung phương thức khởi tạo của 1 class để khởi tạo 
    // giá trị mặc dịnh nào đó cho thuốc tính của class đó

    public function __construct(){
        $this->connection = $this->getConnection();
    }

    // Xây dựng 1 phương thức kết nối cơ sở dữ liệu theo PDO
    public function getConnection(){
        try {
            $connection = new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
        }
        catch (Exception $e){
            die("Lỗi kết nối" . $e->getMessage());
        }

        return $connection;
    }
}


?>