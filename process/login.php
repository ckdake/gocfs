<?php
	require("../includes/constants.php");

	$user = $_POST['username'];
	$password = $_POST['password'];
	$action = $_GET['a'];

	if ($action == "login") {
		if (!(auth($user,$password))){
			update_session('error',"Bad username or password. Please Try again");
		} else {
			start_session($user);
		}
	} else if ($action == "logout") {
		reset_session();	
	}
	
	header("Location: ../");
?>