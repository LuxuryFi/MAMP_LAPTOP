<?php 
    require_once "dbconnect.php";
	require_once "restricted.php";
	
	if (isset($_POST['buy'])){
		$username = $_POST['username'];
	
		$createorder = "INSERT INTO orders (username,orderdate,status) VALUES ('$username',NOW(),'Waiting for check')";
		$createrun = $connection->query($createorder);

		if ($createorder){
			$getorderid = "SELECT orderid from orders where username = '$username' ORDER BY orderid DESC";
			$getrun = $connection->query($getorderid);
			$orderid = mysqli_fetch_array($getrun)['orderid'];
			echo $orderid;
			$getfromcart = "SELECT * from temporarycart where username = '$username'";
			$runfromcart = $connection->query($getfromcart);
			
			while ($row = mysqli_fetch_array($runfromcart)){
				$insert = "INSERT into orderdetail (orderid, productid,qty) values ('$orderid','$row[1]','$row[3]')";
				$runinsert = $connection->query($insert);
			}

			$clearcart = "DELETE FROM temporarycart WHERE username = '$username'";
			$runclear = $connection->query($clearcart); 
		}
	}
	


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../ASM2.css?v=<66>" type="text/css">
	<link rel="stylesheet" href="../reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="js/ASM2.js"></script>
</head>
	<body>
		<div class="grid">
		<?php require_once "header.php" ?>	
			<main class="box">
                <?php
                    $customer =  $user['username'];
                
                ?>
				 <table id="itemlist"  >
					<tr>
						<th>Product Name</th>
						<th>Image</th>
						<th>Quantity</th>
						<th>Date</th>
						<th>Price</th>
						<th>Remove</th>
					</tr>
					
					<?php
                    $item1sql = "SELECT product.productid,productname,productimage,qty,timebuy,temporarycart.price,(qty * temporarycart.price) as total from temporarycart,product
                    where product.productid = temporarycart.productid and temporarycart.username ='$customer'";
					$item1run = $connection->query($item1sql);
					
            	 	while ($row = mysqli_fetch_array($item1run)){ ?> 
					<tr>
                        <td id="col1"><?= $row[1] ?></td>
                        <td id="col44"><img src="../<?= $row[2]?>" alt=""></td>
						<td class="center" id="col3"><?= $row[3]?></td>
						<td id="col2"><?= $row[4]?></td>
						<td class="center"  id="col2"><?= $row[6]?>đ   </td>	
						<td id="col6">
							<form class="frmInline"  action="removeProduct.php" method="POST" onsubmit="return ConfirmDelete()"> 
								<input type="hidden" name="id" value="<?=$row[0]?>">	
								<input type="submit" value="REMOVE">
							</form>
                        </td>             
					</tr>			
                    <?php } ?>
                        <tr>
							<form action="" method="POST">
								<td class = "formbtn" colspan="5">
									<input type="submit" value="ORDER" name="buy" data-submit="...Sending">
									<input type="hidden" value="<?=$customer?>" name="username">
									<input type="button" value="CLEAR" name="clear" >
								</td>
						</form>
						</tr>
						<tfoot class="totalprice">
							<tr class="totalprice center">
								<?php 
								$gettotal = "SELECT SUM(qty * price) as total from temporarycart where username = '$customer'"; 
								$runtotal = $connection->query($gettotal);
								$total = mysqli_fetch_array($runtotal);
								?>
								<td colspan=5>Total </td>
								<td ><?=$total[0]?>đ</td>
							</tr>   
						</tfoot>
			 </table> 
			</main>
			<aside>
				<?php 
					if ($user['role'] < 2){
						require_once "sidenav.php";
					} 
					else { ?>
						<nav id="sidenav">
                    <ul class="inputoption">
						
                    </ul>
				</nav>
				<?php	}
				?>	
			</aside>

			<?php require_once "bottom.php"?>
		</div>
</body>
</html>
