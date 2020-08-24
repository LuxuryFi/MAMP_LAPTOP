<?php require_once "dbconnect.php";
require_once "restricted.php";


if (isset($_POST['add'])) {

    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $customer = $user['username'];
    $add = "INSERT into temporarycart (username,productid,timebuy,qty,price) VALUES ('$customer','$id',NOW(),'$qty','$price')";
    $runadd = $connection->query($add);

    if ($runadd) {
?><script>
    alert("Successful");
</script><?php
                }
            }



            if (isset($_POST['rate'])) {

                $rate = $_POST['star'];
                $feedback = $_POST['feedback'];
                $username = $user['username'];
                $productid = $_POST['id'];

                $feedbacksql = "INSERT INTO productrating (productid, username, rating, feedback, date) values ('$productid','$username','$rate','$feedback',NOW())";
                $feedbackrun = $connection->query($feedbacksql);
            }



                    ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="ASM2.css?v=<225>" type="text/css">
        <link rel="stylesheet" href="reset.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.0.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="js/ASM2.js"></script>
    </head>

    <body>
        <div class="grid"><?php require_once "header.php";
                            ?><main class="box">
                <fieldset id="inputfield2"><?php $getid = $_GET['id'];
                                            $getinfo = "SELECT p.productid, p.productname,p.productimage, p.price, s.companyname, c.categoryname  FROM product as p, supplier as s, category as c WHERE p.supplierid = s.supplierid and p.categoryid = c.categoryid and   p.productid = '$getid'";
                                            $sqlinfo = $connection->query($getinfo);
                                            $info = mysqli_fetch_array($sqlinfo);
                                            ?><table class="outputtable">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <th colspan="5">Product detail</th>
                            <tr>
                                <td class="formlabel1"><label>Product Name</label></td>
                                <td class="formtext"><label><?= $info[1] ?></label></td>
                                <td colspan="3" id="formimage2" rowspan="5" colspan="3"><img id="imagechange"
                                        src="../<?= $info[2] ?>" alt="<?= $info[2] ?>" readonly></td>
                            </tr>
                            <tr>
                                <td class="formlabel1"><label for="price">Price</label></td>
                                <td class="formtext"><label><?= $info[3] ?></label></td>
                            </tr>
                            <tr>
                                <td class="formlabel1"><label>Company Name</label></td>
                                <td class="formtext"><label><?= $info[4] ?></label></td>
                            </tr>
                            <tr>
                                <td class="formlabel1"><label>Category</label></td>
                                <td class="formtext"><label><?= $info[5] ?></label></td>
                            </tr>
                            <tr>
                                <td class="formlabel1"><label for="quantity">Amount</label></td>
                                <td class="formtext"><input name="qty" type="number" max="20" min="1" value="1"></td>
                            </tr>
                            <tr>
                                <td class="formbtn" colspan="3"><input type="submit" value="ADD TO CART"
                                        name="add"><input type="hidden" name="id" value="<?= $info[0] ?>"><input
                                        type="hidden" name="price" value="<?= $info[3] ?>"></td>
                            </tr>
                        </form>
                        <form action="" method="POST">
                            <fieldset id="inputfield3">
                                <tr class="feedback1">
                                    <td rowspan="1" colspan="3">
                                        <div class="padding20"><label for="">Feedback</label><textarea name="feedback"
                                                placeholder="Enter your feedback about product." rows="4"
                                                cols="50"></textarea><input type="hidden" name="star" value="5">
                                            <div class="frmInline3"><input class="frmInline3" type="submit" value="RATE"
                                                    name="rate"><input type="hidden" name="id" value="<?= $info[0] ?>">
                                            </div><br><label>Rating</label>
                                            <div class="stars">
                                                <div name="rating1" data-value="1">★</div>
                                                <div name="rating2" data-value="2">★</div>
                                                <div name="rating3" data-value="3">★</div>
                                                <div name="rating4" data-value="4">★</div>
                                                <div name="rating5" data-value="5">★</div>
                                            </div>
                                            <script>
                                                $('.stars > div').click(function () {
                                                        var star = $(this).data('value');

                                                        $('input[name="star"]').val(star);
                                                    }

                                                );
                                            </script>
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="feedback2">
                                    <td colspan="3">
                                        <table> <?php $getrate = "SELECT rating,count(*) from productrating group by rating,productid having productid = '$info[0]' ";
                                                $runget = $connection->query($getrate);

                                                ?> <tr>
                                                <td colspan="2">Total rating: </td>
                                            </tr> <?php while ($productrate = mysqli_fetch_array($runget)) {
                                                    ?> <tr>
                                                <td> Rate <?php for ($i = 0; $i < $productrate[0]; $i++) {
                                                                    echo '★';
                                                                }

                                                                ?> </td>
                                                <td><?= $productrate[1] ?></td>
                                            </tr> <?php
                                                    }

                                                        ?> </table>
                                    </td>
                                </tr>
                    </table>
                    <table class="outputtable">
                        <th colspan="2">Feedback of Customer</th> <?php $getfeed = "SELECT fullname,image,date,feedback,rating from userLogin,productrating where userLogin.username = productrating.username and productrating.productid = $info[0]";
                                                                    $runget = $connection->query($getfeed);

                                                                    while ($feedbackinfor = mysqli_fetch_array($runget)) {
                                                                    ?> <fieldset>
                            <tr class="feedback3">
                                <td class="center" colspan="1"> <span><img src="../<?= $feedbackinfor[1] ?>"
                                            alt=""></span><br> <span id="ratecolor">
                                        <?php for ($i = 0; $i < $feedbackinfor[4]; $i++) {
                                                                            echo '★';
                                                                        }

                                            ?>
                                    </span> <br> <span class="comment-name"><?= $feedbackinfor[0] ?></span> <br> <span
                                        class="comment-date"><?= $feedbackinfor[2] ?></span><br>
                                    <div class="comment-spacing"></div>
                                </td>
                                <td colspan="2">
                                    <p><?= $feedbackinfor[3] ?></p>
                                    <div class="comment-spacing"></div>
                                </td>
                            </tr>
                        </fieldset> <?php
                                                                    }

                                        ?>
                    </table>
                </fieldset>
                </form>
                </fieldset>
            </main>
            <aside class="box">
                <!-- <nav id="sidenav">
                    <div class="newseries">New Series</div> <img src="../figure/figure2.jpeg" alt="">
                </nav> -->
            </aside>
            <figure>
            </figure>
            <?php require_once "bottom.php" ?>
        </div>
    </body>

    </html>
