<?php
    $error = "";
    $result ="";

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root'; 
    const DB_PASSWORD = 'root';
    const DB_NAME = 'day_22';
    const DB_PORT = 3306;

    $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD, DB_NAME,DB_PORT);

    if(!$connection){
        die("Connect failed".mysqli_connect_error());
    }

    if(isset($_POST)){
        $name = $_POST['name'];
        $description = $_POST['description'];
        // $sql_insert = "INSERT iNTO categories (cate_name,`description`) VALUES ('$"

    }

    echo "abc";
?>

