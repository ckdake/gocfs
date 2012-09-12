<?php
	require("../includes/constants.php");

	if (isadmin()) {
		$user = $_GET['u'];
		$action = $_GET['a'];

		if ($action == "delete") {
			if ($user == get_session('username')) {
				update_session('error',"You cannot delete yourself");
			} else {
				$link = mysql_connect("localhost","gocfs","gocfs")
					or die();

				mysql_select_db("gocfs") 
					or die("Could not select database");
				
				$query = "DELETE FROM users WHERE username=\"".$user."\"";
				mysql_query($query);
				mysql_close($link);
				update_session('message',"User ".$user." deleted");
			}
		} else if ($action == "adminstatus") {
			if ($user == get_session('username')) {
				update_session('error',"You cannot un-administrator yourself");
			} else {

				if (isadmin($user)) {
					$newadmin = 0;
				} else {
					$newadmin = 1;
				}
				
				$link = mysql_connect("localhost","gocfs","gocfs")
					or die();

				mysql_select_db("gocfs") 
					or die("Could not select database");
									
				$query = "UPDATE users SET isadmin=".$newadmin." WHERE username=\"".$user."\"";
				mysql_query($query);
				mysql_close($link);
				update_session('message',"Administrator status for ".$user." changed");
			}
		} else if ($action == "changepassword") {
			update_session('modifying',$user);
			update_session('content',"includes/changepassword.php");
		} else if ($action == "passwd") {
			if ($_POST['p1'] == $_POST['p2']) {
				$link = mysql_connect("localhost","gocfs","gocfs")
					or die();
				mysql_select_db("gocfs") 
					or die("Could not select database");
					
				$newpass = md5($_POST['p1']);
				$query = "UPDATE users SET password=\"".$newpass."\" WHERE username=\"".get_session('modifying')."\"";
				update_session('message',"Password updated for ".get_session('modifying'));
				update_session('modifying',0);
				mysql_query($query);
				mysql_close($link);
				update_session('content',"includes/admin.php");
			} else {
				update_session('error', "Passwords do not match");
			}
		} else if ($action == "newuser") {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			
			$link = mysql_connect("localhost","gocfs","gocfs")
				or die();
			mysql_select_db("gocfs") 
				or die("Could not select database");
					
			$query = "SELECT * FROM users WHERE username=\"".$username."\"";
			$result = mysql_query($query);
			
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line['username'] != null) {
				update_session('error',"User already exists");
			} else {
				$query = "INSERT INTO users values(\"".$username."\",\"".$password."\",0)";
				mysql_query($query);
				update_session('message',"User successfully created");
				update_session('content', "includes/admin.php");
			}
		} else if ($action == "debugon") {
			update_session('debug',true);
		} else if ($action == "debugoff") {
			update_session('debug',false);
		} else {
			update_session('error',"Unknown administrator action");
		}
	}
	header("Location: ../");
?>