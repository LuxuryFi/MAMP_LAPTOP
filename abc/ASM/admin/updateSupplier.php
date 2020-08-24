<?php

require_once "adminRole.php";
require_once "dbconnect.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $phonepost = $_POST['phone'];
    $oldname = $_POST['oldname'];
    $oldphone = $_POST['oldphone'];
    //validate phone number
    function validate_phone($phonecheck)
    {
        $filter = filter_var($phonecheck, FILTER_SANITIZE_NUMBER_INT);

        $phone_to_check = str_replace("-", "", $filter);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    //validate phone number
    if (validate_phone($phonepost) == true) {
        $phone = filter_var($phonepost, FILTER_SANITIZE_NUMBER_INT);
    } else { ?>
        <script>
            alert("The phone number is invalid - <?= $phonepost ?>");
            $phone = $oldphone;
            window.location.href = "manageSupplier.php";
        </script>
    <?php }

    //validate supplier duplicate
    if ($name != $oldname) {
        $duplicatename = "SELECT * from supplier where companyname = '$name'";
    }

    if (isset($duplicatename)) {
        $runcheck = $connection->query($duplicatename);
    }


    if (isset($runcheck->num_rows) && $runcheck->num_rows > 0) { ?>
        <script>
            alert("This supplier has already exist!");
            window.location.href = "manageSupplier.php";
        </script>
        <?php } else {
        if (validate_phone($phonepost)) {
            $sql3 = "UPDATE supplier SET companyname = '$name',address = '$address',region = '$region',phone = '$phone' WHERE supplierid = '$id'";
            $run3 = $connection->query($sql3);
        }

        if (isset($run3) && ($run3 == true)) { ?>
            <script>
                window.location.href = "manageSupplier.php";
                alert("Successful");
            </script>
<?php   }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../ASM2.css?v=<222>" type="text/css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/ASM2.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagechange')
                        .attr('src', e.target.result)
                        .width(400);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>

<body>
    <?php require_once "header.php" ?>
    <div id="inputgrid">
        <main class="background box">
            <div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <fieldset id="inputfield2">
                        <legend>Update Supplier</legend>
                        <table class="inputtable">
                            <?php

                            $id = $_POST['id'];
                            $qry2 = "SELECT * FROM supplier
                                where supplierid = '$id'";
                            $run = $connection->query($qry2);
                            $supplier = mysqli_fetch_array($run);

                            ?>
                            <input type="hidden" name="id" value="<?= $supplier[0] ?>">
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Company Name</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" name="name" value="<?= $supplier[1] ?>" required placeholder="Enter product name" maxlength="50" size="55">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="price">Address</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" placeholder="Enter address" value="<?= $supplier[2] ?>" id="address" name="address" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Region</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" placeholder="Enter region" value="<?= $supplier[3] ?>" id="region" name="region" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Phone</label>
                                </td>
                                <td class="formtext">
                                    <input type="text" placeholder="Enter phone number" value="<?= $supplier[4] ?>" id="phone" name="phone" required maxlength="50" size="55">
                                </td>
                            </tr>
                            <tr>
                                <td class="formbtn" colspan="3">
                                    <input type="submit" value="UPDATE" name="update" data-submit="...Sending">
                                    <input type="button" value="CLEAR" name="clear">
                                    <input type="hidden" value="<?= $supplier[1] ?>" name="oldname">
                                    <input type="hidden" value="<?= $supplier[4] ?>" name="oldphone">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </main>
        <figure class="box"></figure>
        <aside class="background box">
            <nav id="sidenav">
                <ul class="inputoption">
                    <li class="inputoption1"><span class="inputhover"><a href="addProduct.php">Add Product</a></span></li>
                    <li class="inputoption2"><span class="inputhover"><a href="addSupplier.php">Add Supplier</a></span></li>
                    <li class="inputoption3"><span class="inputhover"><a href="manageProduct.php">Manage Product</a></span></li>
                    <li class="inputoption4"><span class="inputhover"><a href="manageSupplier.php">Manage Supplier</a></span></li>
                    <li class="inputoption4"><span class="inputhover"><a href="manageUser.php">Manage User</a></span></li>
                </ul>
            </nav>
        </aside>
        <?php require_once "bottom.php"?>
    </div>
</body>

</html>
