<?php

if (isset($_POST["submit"])) {
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../index.php?msg=Logged Out");
	exit();
} else {
	header("Location: ../index.php?error=Not Allowed");
}
