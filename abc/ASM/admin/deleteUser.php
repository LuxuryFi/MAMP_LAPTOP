<?php 

require_once "dbconnect.php";
require_once "adminRole.php";


if (isset($_POST['username'])){
    $username = $_POST['username'];

    $delete = "DELETE FROM userLogin where username = $username";
    $run = $connection->query($delete);

    if ($run) { ?>
        <script>
            alert("Delete successful");
            window.location.href="manageUser.php";
        </script>
   <?php } else { ?> 
        <script>
            alert("Delete failed - This user still have data");
            window.location.href="manageUser.php";
        </script>

<?php } 
 
}
