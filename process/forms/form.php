<?php

	//this is how you would get input from a form where the form
	// field's name is "username":
	//$my_username = $_POST['username']
	
	//this is the sql query that you want to execute
	$query = "SELECT * FROM users";
	
	//this gets the result of the query
	$result = mysql_query($query)
		or die("query error: " . mysql_error());

	//this is just an example of getting results and putting them
	// in $results.  you MUST store your results as an array in
	// $results for them to be processed correctly.
	$i = 0;
	do {
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($line != null) {
			$results[$i] = $line['username'];
			$i++;
		}
	} while ($line != null);
	
?>