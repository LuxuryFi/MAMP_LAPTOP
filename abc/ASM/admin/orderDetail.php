<?php

require_once "restricted.php";
require_once "dbconnect.php";

?>


<div class="grid">
		<?php require_once "header.php" ?>	
			<main class="">
				 <table id="itemlist"  >
					<tr>
						<th>Order ID</th>
						<th>Product Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
					</tr>
					
					<?php
					
                    $orderid = $_GET['id'];
                    $item1sql = "SELECT orderid,productname,productimage,qty from orderdetail,product where orderdetail.productid = product.productid and orderid = $orderid";
                    $item1run = $connection->query($item1sql);

            	 	while ($row = mysqli_fetch_array($item1run)){ ?> 
					<tr>
						<td id="col1"><?= $row[0] ?></td>
						<td id="col2"><?= $row[1] ?></td>	
                        <td class="center" id="col3"><img src="../<?= $row[2]?>" alt=""></td>
                        <td class="center" id="col5"><?= $row[3]?></td>
					</tr>			
					<?php } ?>
			 </table> 
			</main>
			
			<?php  require_once "sidenav.php" ?>

			<?php require_once "bottom.php"?>
		</div>
