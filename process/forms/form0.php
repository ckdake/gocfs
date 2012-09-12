<?php

	$ssn = $_POST['ssn'];
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$homephone = $_POST['homephone'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$office = $_POST['office'];
	$electionyear = $_POST['electionyear'];
	$electiondate = $_POST['electionyear'] . "-01-01";
	$partycommitteeID = $_POST['party'];
	$datefiled = $_POST['datefiled'];	

	$district = 'default';
	
	if (($ssn != null) && ($first != null) && ($last != null)) {
		$query = "INSERT INTO candidate values('$ssn','$first','$last','$district','$electionyear','$electiondate','$datefiled','$homephone','$street','$city','$state','$zip','$partycommitteeID','$office')";
		//this gets the result of the query
		$result = mysql_query($query)
			or update_session('error',"ERROR: " . mysql_error());

		$results[1] = "Candidate with ssn: " . $ssn . " added sucessfully!";
	} else {
		update_session('error',"ERROR: ssn, first name, and last name must have valid values");
	}
?>
