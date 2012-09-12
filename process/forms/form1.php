<?php

	$committeename = $_POST['committeename'];
	$committeestreet = $_POST['committeestreet'];
	$committeecity = $_POST['committeecity'];
	$committeestate = $_POST['committeestate'];
	$committeezip = $_POST['committeezip'];
	$committeephone = $_POST['committeephone'];
	$committeedate = $_POST['committeedate'];

	$committeetype = $_POST['committeetype'];

	$partyname = $_POST['partyname'];

	$financecandidatessn = $_POST['financessn'];
	$financeoffice = $_POST['financeoffice'];
	$financeyear = $_POST['financeyear'];

	$politicalnumber = $_POST['ballotnumber'];
	$politicalsupporting = $_POST['position'];
	$politicalballotyear = $_POST['ballotyear'];
	$politicalcandidate = $_POST['politicalcandidatename'];
	$politicaloffice = $_POST['politicaloffice'];
	$politicalyear = $_POST['politicalyear'];

	$treasfirst = $_POST['treasfirstname'];
	$treaslast = $_POST['treaslastname'];
	$treasstreet = $_POST['treasstreetname'];
	$treascity = $_POST['treascity'];
	$treasstate = $_POST['treasstate'];
	$treaszip = $_POST['treaszip'];
	$treasphone = $_POST['treasphone'];

	$chairfirst = $_POST['chairfirstname'];
	$chairlast = $_POST['chairlastname'];
	$chairstreet = $_POST['chairstreet'];
	$chaircity = $_POST['chaircity'];
	$chairstate = $_POST['chairstate'];
	$chairzip = $_POST['chairzip'];
	$chairphone = $_POST['chairphone'];

	$bankname = $_POST['bankname'];
	$bankstreet = $_POST['bankstreet'];
	$bankcity = $_POST['bankcity'];
	$bankstate = $_POST['bankstate'];
	$bankzip = $_POST['bankzip'];
	$bankphone = $_POST['bankphone'];
	$accountnumber = $_POST['accountnumber'];

	
	if (($committeename != null) && ($treasfirst != null) && ($chairfirst != null) && ($accountnumber != null)) {

		$committeeid = '';

                $result = mysql_query("SELECT MAX(committeeID) FROM committee");
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($line['MAX(committeeID)'] == null) {
                        $committeeid = 1;
                } else {
                        $committeeid = $line['MAX(committeeID)'] + 1;
                }

		$treasurerid = '';
		$chairpersonid = '';
		$bankid = '';

		$query = '';
		if ($committeetype == "party") {
			$query = "INSERT INTO party_committee VALUES('$committeeid','','$partyname')";
		} else if ($committeetype == "action") {
			$query = "INSERT INTO political_committee VALUES('$committeeid','$politicalcandidate'".
					",'$politicalnumber','$politicalyear','$politicalsupporting')";
		} else if ($committeetype == "finance") {
			$query = "SELECT officename FROM candidate WHERE ssn = '$financecandidatessn'";
			$result = mysql_query($query) or die(mysql_error());	
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			$financeoffice = $line['officename'];
			$query = "INSERT INTO finance_committee VALUES('$committeeid','$financecandidatessn'".
					",'$financeyear','$financeoffice')";
		}
		mysql_query($query) or update_session('error',"ERROR: " . mysql_error());


		$query = "SELECT officerID FROM committee_officer WHERE firstname='$treasfirst' AND".
									" lastname='$treaslast' AND".
									" phone='$treasphone'";
		$result = mysql_query($query);
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($line != null) {
			$treasurerid = $line['officerID'];	
		} else {
			$result = mysql_query("SELECT MAX(officerID) FROM committee_officer");
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line['MAX(officerID)'] == null) {
				$treasurerid = 1;
			} else {
				$treasurerid = $line['MAX(officerID)'] + 1;
			}
			$query = "INSERT INTO committee_officer VALUES('$treasurerid','$treasfirst',".
									"'$treaslast','$treasphone','$treasstreet',".
									"'$treascity','$treasstate','$treaszip')";
			mysql_query($query) or update_session('error', "ERROR: " . mysql_error());
		}	
		$query = "INSERT INTO treasurer VALUES($treasurerid)";
		@mysql_query($query);
		
                $query = "SELECT officerID FROM committee_officer WHERE firstname='$chairfirst' AND".
                                                                        " lastname='$chairlast' AND".
                                                                        " phone='$chairphone'";
                $result = mysql_query($query);
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($line != null) {
                        $chairpersonid = $line['officerID'];
                } else {
                        $result = mysql_query("SELECT MAX(officerID) FROM committee_officer");
                	$line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line['MAX(officerID)'] == null) {
                                $chairpersonid = 1;
                        } else {
                                $chairpersonid = $line['MAX(officerID)'] + 1;
                        }
                        $query = "INSERT INTO committee_officer VALUES('$chairpersonid','$chairfirst',".
                                                                        "'$chairlast','$chairphone','$chairstreet',".
                                                                        "'$chaircity','$chairstate','$chairzip')";
                        mysql_query($query) or update_session('error', "ERROR: " . mysql_error());
                }
                $query = "INSERT INTO chairperson VALUES($chairpersonid)";
                @mysql_query($query);


                $query = "SELECT bankID FROM bank WHERE name='$bankname' AND phone='$bankphone'";
                $result = mysql_query($query);
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($line != null) {
                        $bankid = $line['bankID'];
                } else {
                        $result = mysql_query("SELECT MAX(bankID) FROM bank");
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line['MAX(bankID)'] == null) {
                                $bankid = 1;
                        } else {
                                $bankid = $line['MAX(bankID)'] + 1;
                        }
                        $query = "INSERT INTO bank VALUES('$bankid','$bankname','$bankphone','$bankstreet',".
								"'$bankcity','$bankstate','$bankzip')";
                        mysql_query($query) or update_session('error', "ERROR: ".mysql_error());
                }
             

		$query = "INSERT INTO committee VALUES('$committeeid','$committeename','$committeephone',".
							"'$committeestreet','$committeecity','$committeestate',".
							"'$committeezip','$committeedate','$treasurerid',".
							"'$chairpersonid','$bankid','$accountnumber')";
		$result = mysql_query($query)
			or die(mysql_error());

		$results[1] = "The " . $committeename . " committee was added sucessfully and given ".
				"The committeeID: ".$committeeid.".";
	} else {
		update_session('error',"ERROR: The committee must have a name, an ID, a bank, an account number, a chairperson, and a treasurer");
	}
?>
