<?php
	$title = "Sign Up";
	require_once "header.php";
?>
<section>
	<div class="signup-wrapper">
		<span class="error">
			<?php
				if (isset($_GET["error_msg"])) {
					echo "Error: " .  $_GET["error_msg"];
				}
			?>
		</span>
		<span class="success">
			<?php
				if (isset($_GET["success_msg"])) {
					echo "Success: " .  $_GET["success_msg"];
				}
			?>
		</span>
		<h1>Sign Up</h1>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="firstname" placeholder="Firstname">
			<input type="text" name="lastname" placeholder="Lastname">
			<input type="text" name="email_address" placeholder="E-mail Address">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="user_password" placeholder="Password">
			<button type="submit" name="submit">Submit</button>
		</form>
	</div>
</section>
<?php
	require_once "footer.php";
?>
