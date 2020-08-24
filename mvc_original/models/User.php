<?php
require_once 'models/Model.php';

class User extends Model {
    //khai báo các thuốc tính cho model chihs là
    // các trường của bảng tương ứng

    public $id;
    public $username;
    public $password;

    public function isUsernameExist($username){
        // + Viết câu truy vấn, kiểm tra username có tồn tại trong bảng user hay chưa 
        $sql_select_one = "SELECT * FROM users WHERE username=:username";

        $obj_select_one = $this->connection->prepare($sql_select_one);

        $arr_select = [
            ':username' => $username
        ];

        $obj_select_one->execute($arr_select);

        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)){
            return TRUE;
        }
        return FALSE;
    }

    public function register($username,$password){
        //+ Tạo câu truy vấn
        $sql_insert = "INSERT INTO users(username,`password`) VALUES (:username,:password);";

        $obj_insert = $this->connection->prepare($sql_insert);

        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password
        ];

        $is_insert = $obj_insert->execute($arr_insert);

        return $is_insert;
        
        
    }

    public function getUser($username,$password){
        $sql_select_one = "SELECT * FROM users WHERE username=:username AND password=:password";

        $obj_select_one = $this->connection->prepare($sql_select_one);

        $arr_select = [
            ':username' => $username,
            ':password' => $password
        ];

        $obj_select_one->execute($arr_select);

        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);

        return $user;

    }
}

?>