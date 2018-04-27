<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h2><a class="home" href="index.php">Home</a></h2>
		<div class="login-form">
		<?php if (isset($_SESSION["user_name"])): ?>
			<form action="includes/logout.inc.php" method="POST">
				<button type="submit" name="submit">Logout</button>
			</form>
		<?php else: ?>
			<form action="includes/login.inc.php" method="POST">
				<input type="text" name="login_username" placeholder="Username/E-mail address">
				<input type="password" name="login_password" placeholder="Password">
				<button type="submit" name="submit">Login</button>
			</form>
			<a class="signup" href="signup.php">Sign up</a>
		<?php endif ?>
		</div>
	</header>
