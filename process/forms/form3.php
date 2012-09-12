<?php

	$committeeid = $_POST['committeeid'];
	$daterecieved = $_POST['daterecieved'];
	$contributorname = $_POST['contributorname'];
	$contributorclass = $_POST['contributorclass'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$amount = $_POST['amountrecieved'];
	$employername = $_POST['employername'];
	$contributingcid = $_POST['contributingcommitteeid'];

	if (($daterecieved != null) && ($amount != null) && ($contributorname != null)) {

		$contributorid = -1;
		$new = 1;
		$query = "SELECT contributorID FROM contributor WHERE contributorname='$contributorname' AND ".
					"street='$street'";
		$result = mysql_query($query) or die(mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($line != null) {
			$contributorid = $line['contributorID'];
			$new = 0;
		} else {
			$result = mysql_query("SELECT MAX(contributorID) FROM contributor");
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line['MAX(contributorID)'] == null) {
                                $contributorid = 1;
                        } else {
                                $contributorid = $line['MAX(contributorID)'] + 1;
                        }
			$new = 1;
		}


		if ($new == 1) {
			if ($contributorclass == "individual") {
				mysql_query("INSERT INTO individual VALUES('$contributorid','$employername')");
			} else if ($contributorclass == "corporation") {
				mysql_query("INSERT INTO corporation VALUES('$contributorid')");
			} else if ($contributorclass == "labor") {
				mysql_query("INSERT INTO labor_organization VALUES('$contributorid')");
			} else if ($contributorclass == "party") {
				mysql_query("UPDATE party_committee SET contributorID='$contributorid' WHERE committeeID='$contributingcid'");
			}
			mysql_query("INSERT INTO contributor VALUES('$contributorid','$contributorname',".
					"'$contributorclass','$street','$city','$state','$zip')");
		}
		

		$query = "INSERT INTO contributed_to VALUES('$committeeid','$contributorid','$daterecieved','$amount')";
		$result = mysql_query($query)
			or update_session('error',"ERROR: " . mysql_error());

		$results[1] = "Contribution recorded.";
	} else {
		update_session('error',"ERROR: name, amount, and date must have valid values");
	}
?>
