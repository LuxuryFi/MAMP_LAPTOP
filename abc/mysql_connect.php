<?
// connect mysql.php
// DEMO cach PHP connect to CSDL

//For now, we will use MYSQLI for connect from PHP to Mysql
//+ Mysql library provide two way to connect to mysql
// Use pure PHP function.
// Use OOP.

// In reality, we rarely use mysql.
// because, this library only support MYSQL, and cannot connect others database.
// Use and study about mysql for understand connect database and implement query step by step.
// We used other way to connect with database is PDO - PHP database object - It base on Object Oriented Programming
// PDO support to connect to all present database.

// Write code to connect to database is easy but query is harder.


//DEMO a system: add, edit , delete, show data with mysqsli

// 1 Use query create a query for 

//3. Use PHP conect to mysql through provided function by Mysqli Library
//3.1 

const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_NAME = 'day_21';
const DB_PASSWORD = 'root';
const DB_PORT = 3306;
$connection =  mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$connection){
    die('Connect_error'.mysqli_connect_error());
}

echo "<h2>Connect successful</h2>";


//1. Write query add data for categories

$cate_name = 'Name 1';
$cate_status = 0;

// $sql_insert = "INSERT INTO categories (cate_name,cate_status) VALUES ('Name 3', 0), ('Name 4', 0)";
$sql_update = "UPDATE categories SET cate_name = 'New Name' WHERE cate_id = 1";
// - Implement created query with mysqli_query
$sql_delete = "DELETE FROM categories WHERE cate_id > 3";
$is_success = mysqli_query($connection,$sql_delete);
var_dump($is_success);

//DEMO: Get many records from database
// For example: Get all records in categories table
$sql_select_all = "SELECT * FROM categories";

$result_all = mysqli_query($connection, $sql_select_all);


//
$categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo "<pre>";
print_r($categories);
echo "</pre>";

foreach ($categories as $category){
    echo "Id category: ". $category['cate_id'] . "<br>";
}

$sql_select_one = "SELECT * FROM categories WHERE cate_id = 2 limit 1";

$result_one = mysqli_query($connection, $sql_select_one);

$category = mysqli_fetch_assoc($result_one);
echo "<pre>";
print_r($category);
echo "</pre>";

?>