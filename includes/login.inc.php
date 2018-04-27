<?php

session_start();

if (isset($_POST["submit"])) {
	require_once "db.inc.php";

	$username = htmlspecialchars($_POST["login_username"]);
	$user_password = htmlspecialchars($_POST["login_password"]);

	// check if inputs are empty
	if (empty($username) || empty($user_password)) {
		header("Location: ../index.php?login_msg=Empty input!");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_name='" . $username . "' OR email_address='" . $username . "';";
		$result = mysqli_query($conn, $sql);
		$result_check = mysqli_num_rows($result);

		// check if there's a match
		if ($result_check < 1) {
			header("Location: ../index.php?login_msg=Login Error!");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				$checkPwd = password_verify($user_password, $row["password"]);
				if ($checkPwd) {
					$_SESSION["first_name"] = $row["first_name"];
					$_SESSION["last_name"] = $row["last_name"];
					$_SESSION["email_address"] = $row["email_address"];
					$_SESSION["user_name"] = $row["user_name"];
					header("Location: ../index.php?login_msg=Success!");
					exit();
				} else {
					header("Location: ../index.php?login_msg=Login Error!");
					exit();
				}
			}
		}
	}
} else {
	header("Location: ../index.php?login_msg=error");
}
