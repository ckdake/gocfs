<?php

	$results['fromdate'] = $from = $_POST['from'];
	$results['todate'] = $to = $_POST['to'];
	$ssn = $_POST['candidate'];
	$results['year'] = $year = $_POST['year'];	

        $query = "SELECT firstname,lastname,officename FROM candidate WHERE ssn='$ssn'";
        $result = mysql_query($query) or die(mysql_error());
        $line = mysql_fetch_array($result, MYSQL_BOTH);
        $results['candidate'] = $line['firstname'] . " " . $line['lastname'];
	$results['office'] = $line['officename'];
	mysql_free_result($result);

	if (($from != null) && ($to != null)) {
		$query = "SELECT SUM(expenditure.amount) FROM expenditure ".
				"INNER JOIN finance_committee ".
					"ON expenditure.committeeID = finance_committee.committeeID ".
						"AND finance_committee.ssn = $ssn ".
				"WHERE expenditure.datePaid <= '$to' ".
					"AND expenditure.datePaid >= '$from' ".
					"AND expenditure.amount < 100";
		$result = mysql_query($query)
			or update_session('error',"ERROR: " . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		$results['small'] = $line['SUM(expenditure.amount)'] + 0;	

                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.datePaid <= '$to' ".
                                        "AND expenditure.datePaid >= '$from' ".
                                        "AND expenditure.amount >= 100";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['big'] = $line['SUM(expenditure.amount)'] + 0;
		
		$results['periodtotal'] = $results['big'] + $results['small'];

                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
				"WHERE expenditure.datePaid <= '$to'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['total'] = $line['SUM(expenditure.amount)'] + 0;
	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
