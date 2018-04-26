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
			<form action="#" method="POST">
				<input type="text" name="login_username" placeholder="Username">
				<input type="password" name="login_password" placeholder="Password">
				<button type="submit">Login</button>
			</form>
			<a class="signup" href="signup.php">Sign up</a>
		</div>
	</header>
