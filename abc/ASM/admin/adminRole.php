<?php
 require_once "restricted.php";

 if ($user['role'] >=  2  ) {
    header("Location: main.php");
}

?>
