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
		$query = "SELECT expenditure.datePaid,expenditure.payee,expenditure.code,expenditure.amount ".
				"FROM expenditure ".
				"INNER JOIN finance_committee ".
					"ON expenditure.committeeID = finance_committee.committeeID ".
						"AND finance_committee.ssn = $ssn ".
				"WHERE expenditure.code='A' ORDER BY expenditure.datePaid";
		$result = mysql_query($query)
			or die(mysql_error());
		$results['code-a'] = array();
		$i = 1;
		do {
			$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				$results['code-a'][$i]['date'] = $line['datePaid'];
				$results['code-a'][$i]['payee'] = $line['payee'];
                                $results['code-a'][$i]['code'] = $line['code'];
                                $results['code-a'][$i]['amount'] = $line['amount'];
				$i = $i + 1;		
			}
		} while ($line != null);
                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='A'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
		$line = mysql_fetch_array($result, MYSQL_BOTH);
 		if ($i != 1) {
			$results['code-a'][$i]['payee'] = "sub-total";
			$results['code-a'][$i]['amount'] = $line['SUM(expenditure.amount)'];
		}
                $query = "SELECT expenditure.datePaid,expenditure.payee,expenditure.code,expenditure.amount ".
                                "FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='C' ORDER BY expenditure.datePaid";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['code-c'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['code-c'][$i]['date'] = $line['datePaid'];
                                $results['code-c'][$i]['payee'] = $line['payee'];
                                $results['code-c'][$i]['code'] = $line['code'];
                                $results['code-c'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='C'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
			$results['code-c'][$i]['payee'] = "sub-total";
	                $results['code-c'][$i]['amount'] = $line['SUM(expenditure.amount)'];
		}
                $query = "SELECT expenditure.datePaid,expenditure.payee,expenditure.code,expenditure.amount ".
                                "FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='F' ORDER BY expenditure.datePaid";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['code-f'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['code-f'][$i]['date'] = $line['datePaid'];
                                $results['code-f'][$i]['payee'] = $line['payee'];
                                $results['code-f'][$i]['code'] = $line['code'];
                                $results['code-f'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='F'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                if ($i != 1) {
			$results['code-f'][$i]['payee'] = "sub-total";
	                $results['code-f'][$i]['amount'] = $line['SUM(expenditure.amount)'];
		}
                $query = "SELECT expenditure.datePaid,expenditure.payee,expenditure.code,expenditure.amount ".
                                "FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='O' ORDER BY expenditure.datePaid";
                $result = mysql_query($query)
                        or die(mysql_error());
                $results['code-o'] = array();
                $i = 1;
                do {
                        $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $results['code-o'][$i]['date'] = $line['datePaid'];
                                $results['code-o'][$i]['payee'] = $line['payee'];
                                $results['code-o'][$i]['code'] = $line['code'];
                                $results['code-o'][$i]['amount'] = $line['amount'];
                                $i = $i + 1;
                        }
                } while ($line != null);
                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ".
                                "WHERE expenditure.code='O'";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($i != 1) {
	                $results['code-o'][$i]['payee'] = "sub-total";
        	        $results['code-o'][$i]['amount'] = $line['SUM(expenditure.amount)'];
		}
                $query = "SELECT SUM(expenditure.amount) FROM expenditure ".
                                "INNER JOIN finance_committee ".
                                        "ON expenditure.committeeID = finance_committee.committeeID ".
                                                "AND finance_committee.ssn = $ssn ";
                $result = mysql_query($query)
                        or update_session('error',"ERROR: " . mysql_error());
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                $results['total'] = $line['SUM(expenditure.amount)'];
	} else {
		update_session('error',"ERROR: from and through dates must have valid values");
	}
?>
