<?php 
 require_once "dbconnect.php";
 require_once "restricted.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../ASM2.css?v=<1256>" type="text/css">
	<link rel="stylesheet" href="../reset.css" type="text/css">
	<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,900;1,300;1,500&display=swap" rel="stylesheet">
	<script src="../js/ASM2.js"></script>
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
							<fieldset class="hello">
									<legend >Hello <?=$user['fullname'];?> </legend>
									<table>
										<tr>
											<td><label for="username"><a href="logout.php">Logout</a></label><br></td>
											<td rowspan="2"><img src="../<?=$user['image']?>" alt=""></td>
										</tr>
										<tr>
											<td><label for="accountremember"><a href="updateUser.php?username=<?=$user['username']?>">Information</a> </label><br></td>
										</tr>

									</table>
									
									 
									 
								</fieldset>
						</form>
					</td>
				</tr>
			</table>
		</header>
		
		<nav id="topnav">
			<ul>
				<li><a href="main.php">Main</a></li>
				<li><a href="main.php?id=2">Manga</a></li>
				<li><a href="main.php?id=1">Light Novel</a></li>
				<li><a href="main.php?id=3">Figure</a></li>
				<span></span>
                <li><div><form action=""><input type="text" placeholder="Search" size="20" value="Search"><input type="image" alt="Submit" src="../figure/search.jpg" name="search"></form></div></li>
				<li><a href="logout.php">Logout</a></li>
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
    </body>
</html>
