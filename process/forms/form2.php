<?php

	$committeeid = $_POST['committeeid'];

	$changetreas = $_POST['changetreas'];
	$treasfirst = $_POST['treasfirst'];
	$treaslast = $_POST['treaslast'];
	$treasstreet = $_POST['$treasstreet'];
	$treascity = $_POST['treascity'];
	$treasstate = $_POST['treasstate'];
	$treaszip = $_POST['treaszip'];
	$treasphone = $_POST['treasphone'];

	$changechair = $_POST['changechair'];
	$chairfirst = $_POST['chairfirst'];
	$chairlast = $_POST['chairlast'];
	$chairstreet = $_POST['chairstreet'];
	$chaircity = $_POST['chaircity'];
	$chairstate = $_POST['chairstate'];
	$chairzip = $_POST['chairzip'];
	$chairphone = $_POST['chairphone'];


	if ($changechair == "yes") {
                $query = "SELECT officerID FROM committee_officer WHERE firstname='$chairfirst' AND".
                                                                        " lastname='$chairlast' AND".
                                                                        " phone='$chairphone'";
                $chairid = -1;
		$result = mysql_query($query);
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($line != null) {
                        $chairid = $line['officerID'];
                } else {
                        $result = mysql_query("SELECT MAX(officerID) FROM committee_officer");
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line['MAX(officerID)'] == null) {
                                $chairid = 1;
                        } else {
                                $chairid = $line['MAX(officerID)'] + 1;
                        }
                        $query = "INSERT INTO committee_officer VALUES('$chairid','$chairfirst',".
                                                                        "'$chairlast','$chairphone','$chairstreet',".
                                                                        "'$chaircity','$chairstate','$chairzip')";
                        mysql_query($query) or update_session('error', "ERROR: " . mysql_error());
                }
                $query = "UPDATE committee SET chairpersonID='$chairid' WHERE committeeID='$committeeid'";
                mysql_query($query) or die(mysql_error());
		$query = "INSERT INTO chairperson VALUES('$chairid')";
		mysql_query($query) or die(mysql_error());

		$results[1] = "Chairperson update sucessfull!";
	} else {
		$results[1] = "Chairperson not updated";
	}
        if ($changetreas == "yes") {
                $query = "SELECT officerID FROM committee_officer WHERE firstname='$treasfirst' AND".
                                                                        " lastname='$treaslast' AND".
                                                                        " phone='$treasphone'";
                $treasid = -1;
		$result = mysql_query($query);
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($line != null) {
                        $treasid = $line['officerID'];
                } else {
                        $result = mysql_query("SELECT MAX(officerID) FROM committee_officer");
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line['MAX(officerID)'] == null) {
                                $treasid = 1;
                        } else {
                                $treasid = $line['MAX(officerID)'] + 1;
                        }
                        $query = "INSERT INTO committee_officer VALUES('$treasid','$treasfirst',".
                                                                        "'$treaslast','$treasphone','$treasstreet',".
                                                                        "'$treascity','$treasstate','$treaszip')";
                        mysql_query($query) or update_session('error', "ERROR: " . mysql_error());
                }
                $query = "UPDATE committee SET treasurerID='$treasid' WHERE committeeID='$committeeid'";
                mysql_query($query) or die(mysql_error());
		$query = "INSERT INTO treasurer VALUES('$treasid')";
		mysql_query($query) or die(mysql_error());

		$results[2] = "Treasurer update successful!";
        } else {
		$results[2] = "Treasurer not updated";
	}

?>
