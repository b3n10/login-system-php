<?php
	$title = "Login Page";
	require_once "header.php";
?>
<section>
	<?php if (isset($_SESSION["user_name"])): ?>
		<h1>Welcome, <?php echo $_SESSION["user_name"]; ?></h1>
		<div class="welcome-user">
			<p>Here are your details:</p>
			<ul>
				<li>First name: <?php echo $_SESSION["first_name"]; ?> </li>
				<li>Last name: <?php echo $_SESSION["last_name"]; ?> </li>
				<li>E-mail address: <?php echo $_SESSION["email_address"]; ?> </li>
			</ul>
		</div>
	<?php else: ?>
		<h1>Index Page</h1>
		<span class="error">
			<?php
				if (isset($_GET["login_msg"])) {
					echo "Error: " .  $_GET["login_msg"];
				}
			?>
		</span>
	<?php endif ?>
</section>
<?php
	require_once "footer.php";
?>
