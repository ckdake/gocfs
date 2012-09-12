<?php

	$results['fromdate'] = $from = $_POST['from'];
	$results['todate'] = $to = $_POST['to'];
	$results['year'] = $year = $_POST['year'];	
	$results['office'] = $office = $_POST['office'];


	if (($from != null) && ($to != null)) {
		
		$query = "SELECT firstname,lastname,ssn FROM candidate WHERE officename='$office'";
		$result = mysql_query($query) or die(mysql_error());
		$i = 0;
		$results['candidates'] = array();
		do {
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				$i = $i + 1;
				$first = $line['firstname'];
				$last = $line['lastname'];
				$ssn = $line['ssn'];
				$results['candidates'][$i] = array();
                		$results['candidates'][$i]['name'] = $first . " " . $last;

				$cquery = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
						"INNER JOIN contributor ".
							"ON contributed_to.contributorID = contributor.contributorID ".
						"INNER JOIN committee ".
							"ON committee.committeeID = contributed_to.committeeID ".
						"INNER JOIN finance_committee ".
							"ON finance_committee.committeeID = committee.committeeID ".
						"WHERE '$from' <= contributed_to.date ".
							"AND '$to' >= contributed_to.date ".
							"AND finance_committee.ssn = '$ssn'";
				$cresult = mysql_query($cquery) or die(mysql_error());
				$cline = mysql_fetch_array($cresult, MYSQL_BOTH);
				$results['candidates'][$i]['contributions'] = $cline['SUM(contributed_to.amount)'] + 0;
				$equery = "SELECT SUM(expenditure.amount) FROM expenditure ".
						"INNER JOIN committee ".
							"ON committee.committeeID = expenditureID ".
						"INNER JOIN finance_committee ".
							"ON finance_committee.committeeID = expenditureID ".
						"WHERE '$from' <= expenditure.datePaid ".
                                                        "AND '$to' >= expenditure.datePaid ".
							"AND finance_committee.ssn = '$ssn'";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
				$results['candidates'][$i]['expenditures'] = $eline['SUM(expenditure.amount)'] + 0;
			}
		} while ($line != null);
		
	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
