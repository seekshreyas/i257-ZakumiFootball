<?php
	session_start();

	$_SESSION['authuser'] = 0;

	header("Location: http://localhost/zakumi/index.php");
?>