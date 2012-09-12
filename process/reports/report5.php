<?php

	$results['fromdate'] = $from = $_POST['from'];
	$results['todate'] = $to = $_POST['to'];
	$results['year'] = $year = $_POST['year'];	
	$results['office'] = $office = $_POST['office'];


	if (($from != null) && ($to != null)) {
		
		$query = "SELECT partyName FROM party_committee ORDER BY partyName";
		$result = mysql_query($query) or die(mysql_error());

		$results['parties'] = array();
		do {
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if (($line != null) && ($line['partyName'] != "")) {
				$partyname = $line['partyName'];					

				$results['parties']["$partyname"] = array();
				$cquery = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
						"INNER JOIN party_committee ".
							"ON contributed_to.committeeID = party_committee.committeeID ".
						"WHERE party_committee.partyName = '$partyname' ".
							"AND '$from' <= contributed_to.date ".
							"AND contributed_to.date <= '$to'";             		
				$cresult = mysql_query($cquery) or die(mysql_error());
				$cline = mysql_fetch_array($cresult, MYSQL_BOTH);
				$results['parties']["$partyname"]['contributions'] = 
								$cline['SUM(contributed_to.amount)'] + 0;
				$equery = "SELECT SUM(expenditure.amount) FROM expenditure ".
						"INNER JOIN party_committee ".
							"ON expenditure.committeeID = party_committee.committeeID ".
						"WHERE party_committee.partyName = '$partyname' ".
							"AND '$from' <= expenditure.datePaid ".
                                                        "AND '$to' >= expenditure.datePaid";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
				$results['parties']["$partyname"]['expenditures'] = 
								$eline['SUM(expenditure.amount)'] + 0;
			}
		} while ($line != null);
	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
