<?php

require_once "restricted.php";
require_once "dbconnect.php";

if (isset($_POST['accept'])){
    $orderid = $_POST['orderid'];

    $accept = "UPDATE orders SET status = ('Yes') where orderid = '$orderid'";
    $runaccept = $connection->query($accept);
}

if (isset($_POST['reject'])){
    $orderid = $_POST['orderid'];

    $accept = "UPDATE orders SET status = ('No') where orderid = '$orderid'";
    $runaccept = $connection->query($accept);
}
    




?>


<div class="grid">
		<?php require_once "header.php" ?>	
			<main class="">
				 <table id="itemlist"  >
					<tr>
						<th>Order ID</th>
						<th>User Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Manage</th>
					</tr>
					
					<?php
					if (isset($_GET['getname'])){
						$getuser = $_GET['getname'];
					}
                    $item1sql = "SELECT * from supplier";
                    $username = $user['username'];
					$item1run = $connection->query($item1sql);
					if ($user['role'] >	 1){
						$getorder = "SELECT * from orders where username = '$getuser'";
					}
					else {
						$getorder = "SELECT * from orders";
					}
					
                    $runorder = $connection->query($getorder);
                    			
            	 	while ($row = mysqli_fetch_array($runorder)){ ?> 
					<tr>
						<td id="col1"><a href="orderDetail.php?id=<?=$row[0]?>">#<?= $row[0] ?></a></td>
						<td id="col2"><?= $row[1] ?></td>	
                        <td id="col3"><?= $row[2]?></td>
                        <td class="center" id="col5"><?= $row[3]?></td>
						<td id="col6">
							<form class="frmInline4"  action="" method="POST">
								<input type="hidden"  name="orderid" value="<?=$row[0]?>">
								<input type="submit" VALUE="Accept" name="accept" src="../figure/update.jpg" alt="Submit">
							</form>
							
							<form class="frmInline4"  action="" method="POST" onsubmit="return ConfirmDelete()"> 
								<input type="hidden" name="orderid" value="<?=$row[0]?>">	
								<input type="submit" VALUE="Reject" name="reject" src="../figure/delete.jpg" alt="Submit">
							</form>
                		</td>
					</tr>			
					<?php } ?>
			 </table> 
			</main>
			<?php 
			if($user['role'] >1){ ?>
					
			<?php	} else {
				require_once "sidenav.php";
			} ?>
			<?php require_once "bottom.php"?>
		</div>
