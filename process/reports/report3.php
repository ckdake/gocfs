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
                $results['total'] = 0;
		$query = "SELECT contributed_to.date,contributor.contributorname,contributor.class,contributed_to.amount ".
				"FROM contributed_to ".
				"INNER JOIN contributor ".
					"ON contributed_to.contributorID = contributor.contributorID ".
				"INNER JOIN committee ".
					"ON committee.committeeID = contributed_to.committeeID ".
				"INNER JOIN finance_committee ".
					"ON finance_committee.ssn = '$ssn' ".
					"AND finance_committee.committeeID = contributed_to.committeeID ".
				"WHERE contributor.class='individual' ORDER BY contributed_to.date";
		$result = mysql_query($query)
			or die(mysql_error());
		$results['individual'] = array();
		$i = 1;
		do {
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				$results['individual'][$i]['date'] = $line['date'];
				$results['individual'][$i]['name'] = $line['contributorname'];
                                $results['individual'][$i]['class'] = $line['class'];
                                $results['individual'][$i]['amount'] = $line['amount'];
				$i = $i + 1;		
			}
		} while ($line != null);
                $query = "SELECT SUM(contributed_to.amount) ". 
				"FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn = '$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='individual' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
			$results['individual'][$i]['name'] = "sub-total";
	                $results['individual'][$i]['amount'] = $line['SUM(contributed_to.amount)'];
	                $results['total'] = $results['total'] + $results['individual'][$i]['amount'];
		}

	        $query = "SELECT contributed_to.date,contributor.contributorname,contributor.class,contributed_to.amount ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='corporation' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['corporation'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['corporation'][$i]['date'] = $line['date'];
                                $results['corporation'][$i]['name'] = $line['contributorname'];
                                $results['corporation'][$i]['class'] = $line['class'];
                                $results['corporation'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(contributed_to.amount) ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='corporation' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
                        $results['corporation'][$i]['name'] = "sub-total";
                        $results['corporation'][$i]['amount'] = $line['SUM(contributed_to.amount)'];
	                $results['total'] = $results['total'] + $results['corporation'][$i]['amount'];
		}

                $query = "SELECT contributed_to.date,contributor.contributorname,contributor.class,contributed_to.amount ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='party' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['party'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['party'][$i]['date'] = $line['date'];
                                $results['party'][$i]['name'] = $line['contributorname'];
                                $results['party'][$i]['class'] = $line['class'];
                                $results['party'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(contributed_to.amount) ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='party' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
                        $results['party'][$i]['name'] = "sub-total";
                        $results['party'][$i]['amount'] = $line['SUM(contributed_to.amount)'];
	                $results['total'] = $results['total'] + $results['party'][$i]['amount'];
		}

                $query = "SELECT contributed_to.date,contributor.contributorname,contributor.class,contributed_to.amount ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='labor' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['labor'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['labor'][$i]['date'] = $line['date'];
                                $results['labor'][$i]['name'] = $line['contributorname'];
                                $results['labor'][$i]['class'] = $line['class'];
                                $results['labor'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(contributed_to.amount) ".
                                "FROM contributed_to ".
                                "INNER JOIN contributor ".
                                        "ON contributed_to.contributorID = contributor.contributorID ".
                                "INNER JOIN committee ".
                                        "ON committee.committeeID = contributed_to.committeeID ".
                                "INNER JOIN finance_committee ".
                                        "ON finance_committee.ssn='$ssn' ".
                                        "AND finance_committee.committeeID = contributed_to.committeeID ".
                                "WHERE contributor.class='labor' ORDER BY contributed_to.date";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
                        $results['labor'][$i]['name'] = "sub-total";
                        $results['labor'][$i]['amount'] = $line['SUM(contributed_to.amount)'];
                	$results['total'] = $results['total'] + $results['labor'][$i]['amount'];		
		}
	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
