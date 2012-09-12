<?php

	$ssn = $_POST['candidate'];
	$results['year'] = $year = $_POST['year'];
	
	$result = mysql_query("SELECT firstname,lastname,officename FROM candidate WHERE ssn='$ssn'");
	$line = mysql_fetch_array($result, MYSQL_BOTH);
	$results['office'] = $line['officename'];
	$results['candidate'] = $line['firstname'] . " " . $line['lastname'];

	$results['total'] = 0;
	$results['committees'] = array();
	$query = "SELECT committee.committeeID,committee.name,committee.dateEstablished,A.firstname,A.lastname,".
				"B.firstname,B.lastname FROM committee ".
			"INNER JOIN finance_committee ON finance_committee.committeeID = committee.committeeID ".
			"INNER JOIN committee_officer as A ON A.officerID = committee.treasurerID ".
			"INNER JOIN committee_officer as B ON B.officerID = committee.chairpersonID ".
			"WHERE finance_committee.ssn = '$ssn'";
	$result = mysql_query($query) or die(mysql_error());

	do {
		$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				$id = $line['committeeID'];				
				$results['committees']["$id"] = array();
				$results['committees']["$id"]['name'] = $line['name'];
				$results['committees']["$id"]['date'] = $line['dateEstablished'];				$results['committees']["$id"]['treasurer'] = $line[3]." ".$line[4];
				$results['committees']["$id"]['chairperson'] = $line[5]." ".$line[6];
				$equery = "SELECT SUM(amount) FROM contributed_to ".
						"WHERE committeeID = '$id'";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
				$results['committees']["$id"]['contributions'] = $eline['SUM(amount)'] + 0;
				$results['total'] = $results['total'] + $eline['SUM(amount)'];
			}
	} while ($line != null);

        $query = "SELECT committee.committeeID,committee.name,committee.dateEstablished,A.firstname,A.lastname,".
                                "B.firstname,B.lastname FROM committee ".
                        "INNER JOIN political_committee ON political_committee.committeeID = committee.committeeID ".
                        "INNER JOIN committee_officer as A ON A.officerID = committee.treasurerID ".
                        "INNER JOIN committee_officer as B ON B.officerID = committee.chairpersonID ".
                        "WHERE political_committee.ssn = '$ssn'";
        $result = mysql_query($query) or die(mysql_error());
        do {
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $id = $line['committeeID'];
                                $results['committees']["$id"] = array();
                                $results['committees']["$id"]['name'] = $line['name'];
                                $results['committees']["$id"]['date'] = $line['dateEstablished'];
                                $results['committees']["$id"]['treasurer'] = $line[3]." ".$line[4];
                                $results['committees']["$id"]['chairperson'] = $line[5]." ".$line[6];
                   		$equery = "SELECT SUM(amount) FROM contributed_to ".
                                                "WHERE committeeID = '$id'";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
                                $results['committees']["$id"]['contributions'] = $eline['SUM(amount)'] + 0;
                                $results['total'] = $results['total'] + $eline['SUM(amount)'];
                        }
        } while ($line != null);

?>
