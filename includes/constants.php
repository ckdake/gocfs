<?php

	$debug = false;
	$debug_avaliable = true;

	$form_names = array("Candidate Filing",
			"Committee Statement of Organization",
			"Change of Committee Officer",
			"Contribution Received",
			"Payment Made");
			
	$report_names = array("Candidate Expenditure Summary Report",
			"Candidate Contribution Summary Report",
			"Candidate Expenditure Detail Report",
			"Candidate Contribution Detail Report",
			"Contribution/Expenditure Summary Report By Elected Office",
			"Contribution/Expenditure Summary Report By Political Party",
			"Committees Supporting A Candidate Report",
			"Committees Supporting/Opposing A Ballot Measure");
	
	function auth($username = '', $password = '') {
		if (is_string(get_session('username'))) {
			return true;
		} else if ( !empty($username) ) {
			if (authsql($username,$password)) {
				update_session('username',$username);
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
	
	function debug($debug) {
		if (!$debug) {
			if (get_session('debug')) {
				return true;
			} else {
				return false;
			}
		}  else {
			return true;
		}
	}
	
	function isadmin($username = ''){
		$link = mysql_connect("localhost", "gocfs", "gocfs");
		mysql_select_db("gocfs") or die("Could not select database");
		if ($username == '') {
			$query = "SELECT * FROM users WHERE username=\"".get_session('username')."\"";
		} else {
			$query = "SELECT * FROM users WHERE username=\"".$username."\"";
		}
		$result = mysql_query($query)
			or die("isadmin error: " . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		mysql_free_result($result);	
		mysql_close($link);
		return $line['isadmin'];
	}
	
	function authsql($username = '', $password = '') {
		$link = mysql_connect("localhost", "gocfs", "gocfs");
		mysql_select_db("gocfs") or die("Could not select database");	
		$query = "SELECT * FROM users WHERE username=\"".$username."\"";
		$result = mysql_query($query)
			or die("error: " . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		$retval = ($line['password'] == md5($password));
		mysql_free_result($result);	
		mysql_close($link);
		return $retval;
	}
	
	function start_session($username) {
		update_session('username',$username);
		update_session('error',0);
		update_session('message',0);
		update_session('modifying',0);
	}
	
	function update_session($index, $value) {
		session_start();
		$_SESSION[$index] = $value;
	}
	
	function get_session($index) {
		session_start();
		return $_SESSION[$index];
	}
	
	function reset_session() {
		update_session('authdata',null);
		update_session('content',null);
		session_destroy();
	}
	
?>
