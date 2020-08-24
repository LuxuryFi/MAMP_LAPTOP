<?php
require_once "dbconnect.php";
require_once "restricted.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "DELETE from temporarycart WHERE productid = '$id'";
    $run = $connection->query($sql);

    if ($run) { ?>
        <script>
            alert("Successful");
            window.location.href = "orderconfirm.php";
        </script>

    <?php } 

}?>

