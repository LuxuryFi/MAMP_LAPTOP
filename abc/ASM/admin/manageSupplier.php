<?php

require_once "adminRole.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../ASM2.css?v=<66>" type="text/css">
	<link rel="stylesheet" href="../reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="../js/ASM2.js"></script>
</head>
	<body>
		<div class="grid">
		<?php require_once "header.php" ?>	
			<main class="">
				 <table id="itemlist"  >
					<tr>
						<th>ID</th>
						<th>Company Name</th>
						<th>Address</th>
						<th>Region</th>
						<th>Phone</th>
						<th>Manage</th>
					</tr>
					
					<?php
					$item1sql = "SELECT * from supplier";
					$item1run = $connection->query($item1sql);
					
            	 	while ($row = mysqli_fetch_array($item1run)){ ?> 
					<tr>
						<td id="col1"><?= $row[0] ?></td>
						<td id="col4"><?= $row[1] ?></td>	
						<td id="col3"><?= $row[2]?></td>
						<td id="col2"><?= $row[3]?></td>
						<td id="col5"><?= $row[4]?></td>
						<td id="col6">
							<form class=""  action="updateSupplier.php" method="POST">
								<input type="hidden" name="id" value="<?=$row[0]?>">
								<input type="image" src="../figure/update.jpg" alt="Submit">
							</form>
							
							<form class=""  action="deleteSupplier.php" method="POST" onsubmit="return ConfirmDelete()"> 
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
