<?php
	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];

	
	if (($username == 'webadmin') and ($password=='area32'))
	{
		$_SESSION['authuser'] = 1;
		header("Location: http://localhost/zakumi/index.php");
	}
	else
	{
		$_SESSION['authuser'] = 0;
		echo "incorrect authentication";
	}

?>