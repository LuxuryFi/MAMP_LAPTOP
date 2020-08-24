
<?php

require_once "adminRole.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../ASM2.css?v=<55>" type="text/css">
	<link rel="stylesheet" href="../reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="../js/ASM2.js"></script>
</head>
	<body>
		<div class="grid">
		<?php require_once "header.php" ?>
			<main class="box">
				 <table id="itemlist">
					<tr>
						<th> ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>image</th>
						<th>Supplier</th>
						<th></th>
					</tr>
					
					<?php
					
					$item1 = "SELECT productid,productname,price,productimage,companyname FROM product, supplier
					WHERE product.supplierid = supplier.supplierid";
					$itemResult = $connection->query($item1);
					while($row = mysqli_fetch_array($itemResult))
            		{ ?> 
					<tr>
						<td class="center" id="col1"><?= $row[0] ?></td>
						<td id="col2"><?= $row[1] ?></td>	
						<td class="center" id="col3"><?= $row[2]?></td>
						<td id="col4">
							<div class="box-11">
								<img src="../<?= $row[3]?>" alt="">
							</div>
						</td>
						<td class="center" id="col5"><?= $row[4]?></td>
						<td id="col6">
							<form class=""  action="updateProduct.php" method="POST">
								<input type="hidden" name="id" value="<?=$row[0]?>">
								<input type="image" src="../figure/update.jpg" alt="Submit">
							</form>
							<br>
							<form class=""  action="deleteProduct.php" method="POST" onsubmit="return ConfirmDelete()"> 
								<input type="hidden" name="id" value="<?=$row[0]?>">	
								<input type="image" src="../figure/delete.jpg" alt="Submit">
							</form>
                		</td>
					</tr>			
					<?php } ?>
			 </table> 
			</main>
			<?php require_once "sidenav.php" ?>
				
			<?php require_once "bottom.php"?>
		</div>
	
</body>
</html>
