<?php

require_once "dbconnect.php";
require_once "restricted.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js"
		integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script src="../js/ASM2.js"></script>
	
</head>

<body>
	<div class="grid-index">
		<?php require_once "header.php" ?>
		<div class="banner">
			<img class="imagebanner" src="../figure/banner2.jpg" alt="">
			<img class="imagebanner" src="../figure/inputoption1.jpg" alt="">
			<img class="imagebanner" src="../figure/banner9.jpg" alt="">
			<img class="imagebanner" src="../figure/banner8.jpg" alt="">
		
			<div class="bannercontrol">
				<span class="direct bannerright">&gt;</span>
				<span class="direct bannerleft">&lt;</span>
				<div class="bannercenter">
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
					<span class="dot"></span>
				</div>
			</div>
			<script>
				$('.banner .imagebanner').first().addClass('active');
				$('.banner .bannercontrol .bannercenter .dot').first().addClass('active');

				$('.banner .bannercontrol .bannerright').click(function() {
					var active_banner = $('.banner .imagebanner.active');
					var active_dot = $('.banner .bannercontrol .bannercenter .dot.active');

					$(active_banner).removeClass('active');
					$('.banner .bannercontrol .bannercenter .dot').removeClass('active');
					var next_banner = $(active_banner).next('.imagebanner');
					var next_dot = $(active_dot).next('.dot');
					
					if (next_banner.length == 0) {
						next_banner = $('.banner .imagebanner').first();
					}
					if (next_dot.length == 0){
						next_dot = $('.banner .bannercontrol .bannercenter .dot').first();
					}
					$(next_banner).addClass('active');
					$(next_dot).addClass('active');
				});

				$('.banner .bannercontrol .bannerleft').click(function() {
					var active_banner = $('.banner .imagebanner.active');
					var active_dot = $('.banner .bannercontrol .bannercenter .dot.active');
					
					$(active_banner).removeClass('active');
					$('.banner .bannercontrol .bannercenter .dot').removeClass('active');

					var next_banner = $(active_banner).prev('.imagebanner');
					var next_dot = $(active_dot).prev('.dot');
					 	
					if (next_banner.length == 0) {
						next_banner = $('.banner .imagebanner').last();
					}
					if (next_dot.length == 0){
						next_dot = $('.banner .dot').last();
					}
					$(next_banner).addClass('active');
					$(next_dot).addClass('active');
				});

				$('.banner .bannercontrol .bannercenter .dot').click(function() {
					var dot_index = $(this).index('.banner .bannercontrol .bannercenter .dot');
					$('.banner .bannercontrol .bannercenter .dot').removeClass('active');
					$('.banner .imagebanner').removeClass('active');
					$('.banner .imagebanner').eq(dot_index).addClass('active');
					$(this).addClass('active');
				});

				setInterval(function(){ var active_banner = $('.banner .imagebanner.active');
					$(active_banner).removeClass('active');
					var next_banner = $(active_banner).next('.imagebanner');
					if (next_banner.length == 0) {
						next_banner = $('.banner .imagebanner').first();
					}
					$(next_banner).addClass('active'); }, 3000);

			</script>
		</div>
		<main class="">
			<div class="marginright" id="grid-item">
				<?php
				$recordperpage = 16;
				$page = $_GET['page'] ?? 1;
				$offset = (($page - 1) * $recordperpage);
				if(isset($_GET['id'])){
					$catepage = $_GET['id'];
					$totalrecord = "SELECT count(*) from product where categoryid = '$catepage'";
				}
				else {
					$totalrecord = "SELECT count(*) from product";
				}

				$result = $connection->query($totalrecord);
				$total = mysqli_fetch_array($result)[0];
				$numberofpage = ceil($total * 1 / $recordperpage);


				if (isset($_GET['id'])) {
					$getid = $_GET['id'];
					$item1 = "SELECT productimage,productname,price,categoryname,productid FROM product,category
                    	where product.categoryid = category.categoryid and product.categoryid = '$getid' limit $offset,$recordperpage";
				} else {
					$item1 = "SELECT productimage,productname,price,categoryname,productid  FROM product,category
                    	where product.categoryid = category.categoryid limit $offset,$recordperpage";
				}
				$itemResult = $connection->query($item1);

				while ($row = mysqli_fetch_array($itemResult)) {
				?>
				<div id="areaitem" class="item">
					<table class="tableitem">
						<tr class="box-22">
							<td id="itemimage" colspan="2"><a href="productdetail.php?id=<?= $row[4] ?>"><img
										src="../<?= $row[0] ?>" alt=""></a>
							</td>
						</tr>
						<tr>
							<td id="itemcate"><?= $row[3] ?></td>
						</tr>
						<tr>
							<td id="itemname" colspan="2"><a
									href="productdetail.php?id=<?= $row[4] ?>"><?= $row[1] ?></a></td>
						</tr>
						<tr>
							<td id="itemprice"><?= $row[2] ?><span id="vnd">đ</span></td>
						</tr>
						
					</table>
				</div>
				<?php } ?>
			</div>
			<ul class="pagination">
				<?php
				$pagenumber = 1;
				while ($pagenumber <= $numberofpage) { ?>
				<?php if (isset($_GET['id'])){ ?>
				<li><a href="main.php?page=<?= $pagenumber ?>&id=<?=$getid?>" class="<?= $page == $pagenumber ? 'active' : ''; ?>">
						<?= $pagenumber ?> </a></li>
			<?php	} else {?>
				<li><a href="main.php?page=<?=$pagenumber?>" class="<?= $page == $pagenumber ? 'active' : ''; ?>">
						<?= $pagenumber ?> </a></li>
			<?php } ?>
				<?php $pagenumber = $pagenumber + 1;
				} ?>
			</ul>
		</main>
		
		<figure class="">
			<div class="newseries">New Series</div>
			<img src="../figure/figure2.jpeg" alt="">
		</figure>
		<aside class="box">

		</aside>
		<?php require_once "bottom.php"?>
	</div>
</body>

</html>
