<?php

require_once "dbconnect.php";
require_once "adminRole.php";

$id = $_POST['id'];


$sql = "DELETE FROM supplier WHERE supplierid = '$id'";
$run = $connection->query($sql);
 
if ($run){ ?>
    <script>
        alert("Deleted ");
        window.location.href="manageSupplier.php";
    </script>
<?php } else { 
    echo $id; ?>
    <script>
        alert("Failed");
        window.location.href="manageSupplier.php";
       
    </script>
<?php } ?>




