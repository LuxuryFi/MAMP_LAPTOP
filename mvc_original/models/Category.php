<?php
require_once 'models/Model.php';

class Category extends Model {
    
    public function getAll(){
        $sql_select_all = "SELECT * from categories";
        
        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}