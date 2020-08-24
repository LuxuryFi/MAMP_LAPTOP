<?php

require_once "adminRole.php";

if (isset($_POST['add'])) {
    $name = $_POST['companyname'];
    $address = $_POST['address'];
    $region = $_POST['region'];
    $phonepost = $_POST['phone'];

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
    if (validate_phone($phonepost)) {
        $phone = filter_var($phonepost, FILTER_SANITIZE_NUMBER_INT);
    } else { ?>
        <script>
            alert("The phone number is invalid - <?= $phonepost ?>");
            window.location.href = "addSupplier.php";
        </script>
    <?php }

    $duplicatename = "SELECT * from supplier where companyname = '$name'";
    $runcheck = $connection->query($duplicatename);
    //validate supplier duplicate
    if ($runcheck->num_rows > 0) { ?>
        <script>
            alert("This supplier has already exist!");
            window.location.href = "addSupplier.php";
        </script>
        <?php } else {
            if(validate_phone($phonepost)){
                $sql = "INSERT INTO supplier (companyname,address,region,phone) values('$name','$address','$region','$phone')";
                $run = $connection->query($sql);
            }
        
        if ($run) { ?>
            <script>
                alert("Successful");
                window.location.href = "manageSupplier.php";
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
    <link rel="stylesheet" href="ASM2.css?v=<566>" type="text/css">
    <link rel="stylesheet" href="reset.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="js/ASM2.js"></script>
</head>

<body>
    <?php require_once "header.php" ?>

    <div id="inputgrid">

        <main class="background box">
            <div>
                <form action="" method="POST">
                    <fieldset id="inputfield2">
                        <legend>Add new supplier</legend>
                        <table class="inputtable">
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Company Name</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" id="companyname" name="companyname" placeholder="Enter comapany name" required maxlength="50" size="55">
                                    </div>
                                </td>
                                <td id="formimage" rowspan="4"><img src="figure/kadokawa.jpg" alt=""></td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Address</label>
                                </td>
                                <td class="formtext">
                                    <div>

                                        <input type="text" name="address" placeholder="Enter address" required maxlength="50" size="55">
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Region</label>
                                </td>
                                <td class="formtext">
                                    <div>

                                        <input type="text" name="region" placeholder="Enter region" required maxlength="50" size="55">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formlabel">
                                    <label for="companyname">Phone</label>
                                </td>
                                <td class="formtext">
                                    <div>
                                        <input type="text" name="phone" required placeholder="Enter phone" maxlength="50" size="55"><br>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="formbtn" colspan="3">
                                    <input type="submit" value="ADD" name="add" data-submit="...Sending">
                                    <input type="button" value="CLEAR" name="clear">
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
                    <li class="inputoption1"><span class="inputhover"><a href="addProduct.php">Add Product</a></span>
                    </li>
                    <li class="inputoption2"><span class="inputhover"><a href="addSupplier.php">Add Supplier</a></span>
                    </li>
                    <li class="inputoption3"><span class="inputhover"><a href="manageProduct.php">Manage
                                Product</a></span></li>
                    <li class="inputoption4"><span class="inputhover"><a href="manageSupplier.php">Manage
                                Supplier</a></span></li>
                    <li class="inputoption5"><span class="inputhover"><a href="manageUser.php">Manage User</a></span>
                    <li class="inputoption5"><span class="inputhover"><a href="acceptOrder.php">Manage Order</a></span></li>
                    </li>
                </ul>
            </nav>
        </aside>
        <?php require_once "bottom.php"?>
    </div>
</body>

</html>
