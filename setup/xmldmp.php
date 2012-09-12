<?php
	require("../includes/constants.php");
	if (auth()) {
                $link = mysql_connect("localhost", "gocfs", "gocfs");
                mysql_select_db("gocfs") or die("Could not select database");

		$xmldata = "<?xml version=\"1.0\"?>\r\n";

		$rownames = mysql_query("SHOW TABLES");
		while ($line = mysql_fetch_array($rownames, MYSQL_BOTH)) {
			$xmldata .= "<table><name>".$line[0]."</name>\r\n";
	 
			$q = "SELECT * FROM ".$line[0];
			$req = mysql_query($q) or die(mysql_error());

			while($row = mysql_fetch_array($req, MYSQL_BOTH)) {
		
				$xmldata .= "<item>\r\n";
				for($j=0;$line=each($row);$j++) {
		        	    if($j%2) {
			        	    $xmldata .= "<$line[0]>$line[1]</$line[0]>\r\n";
				    }
			       	}
			        $xmldata .= "</item>\r\n";
			}
			$xmldata .= "</table>\r\n";
		}
		$xmldata .= "\r\n</xml>";

		echo $xmldata;

                mysql_close($link);
	} else {
		echo "you must be logged into view the database dump";
	}
?>
