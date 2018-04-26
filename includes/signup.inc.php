<?php

if (isset($_POST["submit"])) {
	require_once "db.inc.php";

	$firstname = htmlspecialchars($_POST["firstname"]);
	$lastname = htmlspecialchars($_POST["lastname"]);
	$email_address = htmlspecialchars($_POST["email_address"]);
	$username = htmlspecialchars($_POST["username"]);
	$user_password = htmlspecialchars($_POST["user_password"]);

	// error checking
	if (empty($firstname) || empty($lastname) || empty($email_address) || empty($username) || empty($user_password)) {
		header("Location: ../signup.php?error_msg=Incomplete input submitted!");
		exit(); // stop whole script
	} else {
		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname)) {
			// var_dump( !preg_match("/^[a-zA-Z]*$/", $firstname) );
			header("Location: ../signup.php?error_msg=Invalid characters submitted!");
			exit(); // stop whole script
		} else {
			if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?error_msg=Invalid E-mail!");
				exit(); // stop whole script
			} else {
				$sql = "SELECT * FROM users WHERE user_name=?;";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "SQL statement failed!";
				} else {
					mysqli_stmt_bind_param($stmt, "s", $username);
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);

					if ($result->num_rows != 0) {
						header("Location: ../signup.php?error_msg=Username Taken!");
						exit(); // stop whole script
					} else {
						// if no record yet
						// hash password
						$hashedPwd = password_hash($user_password, PASSWORD_DEFAULT);

						// insert record to db
						$sql = "INSERT INTO users (first_name, last_name, email_address, user_name, password) VALUES(?, ?, ?, ?, ?);";
						$stmt = mysqli_stmt_init($conn);

						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "SQL statement failed!";
						} else {
							$bp = mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email_address, $username, $hashedPwd);
							$ex = mysqli_stmt_execute($stmt);
							header("Location: ../signup.php?success_msg=Record Saved!");
							exit(); // stop whole script
						}
					}
				}
			}
		}
	}
} else {
	header("Location: ../signup.php");
}
