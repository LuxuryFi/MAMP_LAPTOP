<?php 
session_start();
require_once "admin/dbconnect.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	$un = $_POST['username'];
	$pw = $_POST['password'];
	$pass = $pw; // mã hóa pass = md;
	//Lưu ý cần phải mã hóa mật khẩu  trong database
	// đối chiếu thông tin login với database
	$sql = "SELECT username,password From userlogin Where username = '$un' and password = '$pass'";
	$run = $connection->query($sql);

	if ($run->num_rows > 0) {
		// co tối thiểu 1 record trong DB>
		$_SESSION['username'] = $un;
		$_SESSION['password'] = $pass;

		header("Location: admin/main.php");
	}
}

?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="ASM2.css?v=2222" type="text/css">
	<link rel="stylesheet" href="reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script src="js/ASM2.js"></script>
	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>


</head>

<body>
	<div class="grid-index">
		<header>
			<table id="loginform">
				<tr>
					<td id="login1">
						<div><a href="ASM2.php"><img src="figure/banner-tet-2019.png" alt="vnsharing"></a></div>
					</td>
					<td id="login2">
						<form id="loginform" action="" method="POST">
							<fieldset class="loginfield">
								<legend>Login </legend>
								<label for="username">Username</label><br>
								<input type="text" name="username" id="username" placeholder="Enter username" required>
								<input type="checkbox" id="accountremember" onclick="showPass()" name="accountremember" title="Remember your login information for the next login time.">
								<label for="accountremember">Remember</label><br><br>
								<label for="password">Password</label><br>
								<input type="password" name="password" id="password" placeholder="Enter password" required><span> </span><input type="submit" id="login" name="" value="Login" title="Enter your username and password in the boxes provided to login, or click the 'register' button to create a profile for yourself."><br>
								<label> <a href="admin/createUser.php">Create new account</a> </label>
							</fieldset>
						</form>
					</td>
				</tr>
			</table>
		</header>
		<nav id="topnav">
			<ul>
				<li><a href="index.php">Main</a></li>
				<li><a href="index.php?id=2">Manga</a></li>
				<li><a href="index.php?id=1">Light Novel</a></li>
				<li><a href="index.php?id=3">Figure</a></li><span></span>
				<li><input type="text" placeholder="Search" size="20" value="Search"></li>
			</ul>
		</nav>
		<div class="banner">
			<img class="imagebanner" src="figure/banner2.jpg" alt="">
			<img class="imagebanner" src="figure/inputoption1.jpg" alt="">
			<img class="imagebanner" src="figure/inputoption2.jpg" alt="">
			<div class="bannercontrol">
				<span class="direct bannerright">&gt;</span>
				<span class="direct bannerleft">&lt;</span>
				<div class="bannercenter">
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
					$(active_banner).removeClass('active');
					var next_banner = $(active_banner).next('.imagebanner');
					if (next_banner.length == 0) {
						next_banner = $('.banner .imagebanner').first();
					}
					$(next_banner).addClass('active');
				});

				$('.banner .bannercontrol .bannerleft').click(function() {
					var active_banner = $('.banner .imagebanner.active');
					$(active_banner).removeClass('active');
					var next_banner = $(active_banner).prev('.imagebanner');
					if (next_banner.length == 0) {
						next_banner = $('.banner .imagebanner').last();
					}
					$(next_banner).addClass('active');
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
							<td id="itemimage" colspan="2"><a href="admin/viewer.php?id=<?= $row[4] ?>"><img
										src="<?= $row[0] ?>" alt=""></a>
							</td>
						</tr>
						<tr>
							<td id="itemname" colspan="2"><a
									href="admin/viewer.php?id=<?= $row[4] ?>"><?= $row[1] ?></a></td>
						</tr>
						<tr>
							<td id="itemprice"><?= $row[2] ?><span id="vnd">đ</span></td>
						</tr>
						<tr>
							<td id="itemcate"><?= $row[3] ?></td>
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
				<li><a href="index.php?page=<?= $pagenumber ?>&id=<?=$getid?>" class="<?= $page == $pagenumber ? 'active' : ''; ?>">
						<?= $pagenumber ?> </a></li>
			<?php	} else {?>
				<li><a href="index.php?page=<?=$pagenumber?>" class="<?= $page == $pagenumber ? 'active' : ''; ?>">
						<?= $pagenumber ?> </a></li>
			<?php } ?>
				<?php $pagenumber = $pagenumber + 1;
				} ?>
			</ul>
		</main>

		<figure class="box">
			<div class="box newseries">New Series</div><img src="figure/figure2.jpeg" alt=""><img src="figure/a.jpg" alt="">
		</figure>
		<footer>
			<nav id="botnav">
				<a target="_blank" href="https://www.facebook.com/quocanh21598" class="fa fa-facebook"></a>
				<a target="_blank" href="https://twitter.com/FakkuKururu" class="fa fa-twitter"></a>
				<a target="_blank" href="https://www.google.com/" class="fa fa-google"></a>
				<a target="_blank" href="https://www.youtube.com/channel/UCfVRNfFMze0fTXjqqKLPk4Q?view_as=subscriber	" class="fa fa-youtube"></a>
				<a target="_blank" href="#" class="fa fa-skype"></a>
				<a target="_blank" href="#" class="fa fa-linkedin"></a>
			</nav>
		</footer>
	</div>
</body>

</html>
