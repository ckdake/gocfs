<?php
	require("../includes/constants.php");
	if (auth()) {
		$results = array();
		$link = mysql_connect("localhost", "gocfs", "gocfs");
		mysql_select_db("gocfs") or die("Could not select database");
		if (get_session('index') == -1) {
			include("forms/form.php");
		} else {
			include("forms/form".get_session('index').".php");
		}
//		mysql_free_result($result);	
		mysql_close($link);
		update_session('results',$results);
	}
	header("Location: ../");
?>
