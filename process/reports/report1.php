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
		$query = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
				"INNER JOIN finance_committee ".
					"ON contributed_to.committeeID = finance_committee.committeeID ".
						"AND finance_committee.ssn = $ssn ".
				"WHERE contributed_to.date <= '$to' ".
					"AND contributed_to.date >= '$from' ".
					"AND contributed_to.amount < 500";
		$result = mysql_query($query)
			or update_session('error',"ERROR: " . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		$results['small'] = $line['SUM(contributed_to.amount)'] + 0;	
                $query = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
                                "INNER JOIN finance_committee ".
                                        "ON contributed_to.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE contributed_to.date <= '$to' ".
                                        "AND contributed_to.date >= '$from' ".
                                        "AND contributed_to.amount >= 500 ".
					"AND contributed_to.amount < 1000";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['sm'] = $line['SUM(contributed_to.amount)'] + 0;
                $query = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
                                "INNER JOIN finance_committee ".
                                        "ON contributed_to.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE contributed_to.date <= '$to' ".
                                        "AND contributed_to.date >= '$from' ".
                                        "AND contributed_to.amount >= 1000 ".
                                        "AND contributed_to.amount < 5000";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['medium'] = $line['SUM(contributed_to.amount)'] + 0;
                $query = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
                                "INNER JOIN finance_committee ".
                                        "ON contributed_to.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE contributed_to.date <= '$to' ".
                                        "AND contributed_to.date >= '$from' ".
                                        "AND contributed_to.amount >= 5000";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['large'] = $line['SUM(contributed_to.amount)'] + 0;
		
		$results['periodtotal'] = $results['small'] + $results['medium'] + $results['sm'] + $results['large'];

                $query = "SELECT SUM(contributed_to.amount) FROM contributed_to ".
                                "INNER JOIN finance_committee ".
                                        "ON contributed_to.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
				"WHERE contributed_to.date <= '$to'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['total'] = $line['SUM(contributed_to.amount)'] + 0;
            

	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
