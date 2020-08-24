<?php
//mvc_demo/models/Category.php
//File model quản lý category

require_once 'configs/Database.php';
require_once 'Model.php';

class Category extends Model {
    //khai báo các thuộc tính chính là tên trường
    // tương ứng trong bảng
    public $id;
    public $name;
    public $amount;

    //Phương thức kết nối CSDL theo PDO
    public function getConnection(){
        $connection = '';
            // Với PDB nên dùng khối try cattch để khởi tạo
            // để bắt các ngoại lệ, lỗi liên quan đến việc kết nối có thể xảy ra mà ko lường trc được
        try {
            $connection = new PDO(Database::DB_DSN, Database::DB_USERNAME, Database::DB_PASSWORD);
        } 
        catch (Exception $e){
            die("Lỗi kết nối: ".$e->getMessage());
        }

        return $connection;
    }

    public function insert(){
        $connection = $this->getConnection();

        $sql_insert = "INSERT INTO categories (cate_name,amount) VALUES (:cate_name, :amount);";

        $obj_insert = $connection->prepare($sql_insert);

        $arr_insert = [
            ':cate_name' => $this->name,
            ':amount' => $this->amount
        ];

        $is_insert = $obj_insert->execute($arr_insert);

        return $is_insert;
    }

    public function getAll(){
        $connection = $this->getConnection();

        $sql_select_all = "SELECT * From categories ORDER BY cate_id DESC";

        $obj_select_all = $connection->prepare($sql_select_all);

        $obj_select_all->execute();

        return $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($id){
        $sql_select_one = "SELECT * From categories WHERE cate_id = $id";

        $connection = $this->getConnection();

        $obj_select_one = $connection->prepare($sql_select_one);

        $obj_select_one->execute();

        return $category_view = $obj_select_one->fetch(PDO::FETCH_ASSOC);

    }

    public function update($id){
        $connection = $this->getConnection();

        $sql_update = "UPDATE categories SET cate_name = :name, amount = :amount WHERE cate_id = $id"; 

        $arr_update = [
            ':name' => $this->name,
            ':amount' => $this->amount
        ];

        $obj_update = $connection->prepare($sql_update);

        $is_update = $obj_update->execute($arr_update);
        return $is_update;
    }

    public function delete($id){
        $connection = $this->getConnection();
        $sql_delete = "DELETE FROM categories WHERE cate_id = $id";
        $obj_delete = $connection->prepare($sql_delete);
        
        $is_delete = $obj_delete->execute();

        return $is_delete;
    }
}