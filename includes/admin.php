<?php
	$link = mysql_connect("localhost","gocfs","gocfs")
		or die();

	mysql_select_db("gocfs") or die("Could not select database");
	

	$result = mysql_query("SELECT * FROM users")
                or die("error: " . mysql_error());
	
	echo "<div class=\"title\">User Management</div>\n<br />";
	
	include("includes/message.php");
	
	echo "<table class=\"resulttable\" border=\"0\" cellpadding=\"5\">\n";
	do {
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($line != null) {
			printUser($line);
		}
	} while ($line != null);
	echo "</table>";
	
	echo "<br /><a href=\"?p=includes/newuser.php\">create new user</a>";

	mysql_free_result($result);	
	mysql_close($link);
	
	function printUser($user) {
		echo "<tr><td>".$user['username']."</td>\n";
		if ($user['isadmin'] == 1) {
			echo "<td>administrator</td>\n";
		} else {
			echo "<td>user</td>\n";
		}
		echo "<td><a href=\"process/admin.php?a=delete&amp;u=".$user['username']."\">[delete]</a></td>\n";
		echo "<td><a href=\"process/admin.php?a=changepassword&amp;u=".$user['username']."\">[change password]</a></td>\n";
		echo "<td><a href=\"process/admin.php?a=adminstatus&amp;u=".$user['username']."\">[change admin status]</a></td>\n";
	}
	
?>
