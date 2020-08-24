<?php require_once "admin/dbconnect.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="ASM2.css?v=1234" type="text/css">
	<link rel="stylesheet" href="reset.css" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="js/ASM2.js"></script>
	<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
</head>
	<body>
		<header>
			<table id="loginform">
				<tr>
					<td id="login1">
						<div>
							<a href="main.php"><img src="figure/banner-tet-2019.png" alt="vnsharing"></a>
						</div>
					</td>
					<td id="login2"> 
						<form id ="loginform" action=""  method="POST">

								<!-- <fieldset>
									<legend>Login </legend>
									<label for="username">Username</label><br>
									<input type="text" name="username" id="username" placeholder="Enter username" required>
									 <input type="checkbox" id="accountremember" onclick="showPass()" name="accountremember" title="Remember your login information for the next login time.">
									 <label for="accountremember">Remember</label><br>
									<label for="password">Password</label><br>
									<input type="password" name="password" id="password" placeholder="Enter password" required> <input type="submit" id="login" name="" value="Login" title="Enter your username and password in the boxes provided to login, or click the 'register' button to create a profile for yourself."><br>
								</fieldset> -->
						</form>
					</td>
					</tr>
			</table>
		</header>
		
		<nav id="topnav">
			<ul>
				<li><a href="main.php">Main</a></li>
				<li>Best-seller</li>
				<li><a href="main.php?id=2">Manga</a></li>
				<li><a href="main.php?id=1">Light Novel</a></li>
				<li><a href="main.php?id=3">Figure</a></li>
				<span></span>
                <li><input type="text" placeholder="Search" size="20" value="Search"> </li>
                <li>
					<a href="admin/logout.php">Logout</a>
				</li>
				
				<?php 
				if (isset($user)){ 
					if ($user['role'] < 2) { ?>
					<li>
						<a href="admin">Admin</a>
					</li>
				<?php } ?>
				<?php } ?>
			</ul>
		</nav>
    </body>
</html>
