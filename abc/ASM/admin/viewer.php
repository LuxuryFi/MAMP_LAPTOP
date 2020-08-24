<?php require_once "dbconnect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../ASM2.css?v=<1245>" type="text/css">
	<link rel="stylesheet" href="../reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,900;1,300;1,500&display=swap" rel="stylesheet">
	<script src="js/ASM2.js"></script>
	<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
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
		<header>
			<table id="loginform">
				<tr>
					<td id="login1">
						<div>
							<a href="main.php"><img src="../figure/banner-tet-2019.png" alt="vnsharing"></a>
						</div>
					</td>
					<td id="login2"> 
						<form id ="loginform" action=""  method="POST">
                        
						</form>
					</td>
				</tr>
			</table>
		</header>
	<div class="grid">
		<nav id="topnav">
			<ul>
				<li><a href="../index.php">Main</a></li>
				<li><a href="../index.php?id=2">Manga</a></li>
				<li><a href="../index.php?id=1">Light Novel</a></li>
				<li><a href="../index.php?id=3">Figure</a></li>
				<span></span>
                <li><div><form action=""><input type="text" placeholder="Search" size="20" value="Search"><input type="image" alt="Submit" src="../figure/search.jpg" name="search"></form></div></li>

				<?php if (isset($user)){ 
					if ($user['role'] < 2) { ?>	
					<li>
						<a href="../admin/updateUser.php">Admin</a>
					</li>
				<?php } ?>
				<?php } ?>
				<li id="cart">
					<a href="orderconfirm.php"><img src="../figure/cart.jpg" alt=""></a>
				</li>
			</ul>
		</nav>
        
                            <main class="box">
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
                                <td colspan="3" id="formimage2" rowspan="5" colspan="3"><img id="imagechange" src="../<?= $info[2] ?>" alt="<?= $info[2] ?>" readonly></td>
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
                                <td class="formbtn" colspan="3"><input type="hidden" name="id" value="<?= $info[0] ?>"><input type="hidden" name="price" value="<?= $info[3] ?>"></td>
                            </tr>
                        </form>
                        <form action="" method="POST">
                            <fieldset id="inputfield3">

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
                                    <td class="center" colspan="1"> <span><img src="../<?= $feedbackinfor[1] ?>" alt=""></span><br> <span id="ratecolor">
                                            <?php for ($i = 0; $i < $feedbackinfor[4]; $i++) {
                                                                            echo '★';
                                                                        }

                                            ?>
                                        </span> <br> <span class="comment-name"><?= $feedbackinfor[0] ?></span> <br> <span class="comment-date"><?= $feedbackinfor[2] ?></span><br>
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
                <nav id="sidenav">
                    <div class="newseries">New Series</div> <img src="../figure/figure2.jpeg" alt="">
                </nav>
            </aside> <?php require_once "bottom.php" ?>
        </div>
                                                                </div>
    </body>

    </html>
