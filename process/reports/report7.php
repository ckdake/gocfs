<?php

	$results['propositionnumber'] = $ballotnumber = $_POST['ballotnumber'];
	$results['year'] = $year = $_POST['year'];
	
	$result = mysql_query("SELECT description FROM proposition WHERE number ='$ballotnumber'");
	$line = mysql_fetch_array($result, MYSQL_BOTH);
	$results['description'] = $line['description'];

	$results['supporters'] = array();
	$query = "SELECT committee.committeeID,committee.name FROM committee ".
			"INNER JOIN political_committee ON political_committee.committeeID = committee.committeeID ".
			"WHERE political_committee.supporting = '1' ".
				"AND political_committee.propositionnumber = '$ballotnumber'";
	$result = mysql_query($query) or die(mysql_error());
	
	$results['supportingtotal'] = 0;	
	do {
		$line = mysql_fetch_array($result, MYSQL_BOTH);
			if ($line != null) {
				$id = $line['committeeID'];				
				$results['supporters']["$id"]['name'] = $line['name'];

				$equery = "SELECT SUM(amount) FROM contributed_to ".
						"WHERE committeeID = '$id'";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
				$results['supporters']["$id"]['contributions'] = $eline['SUM(amount)'] + 0;
				$results['supportingtotal'] = $results['supportingtotal'] + $eline['SUM(amount)'];
			}
	} while ($line != null);

        $results['opposers'] = array();
        $query = "SELECT committee.committeeID,committee.name FROM committee ".
                        "INNER JOIN political_committee ON political_committee.committeeID = committee.committeeID ".
                        "WHERE political_committee.supporting = '0' ".
                                "AND political_committee.propositionnumber = '$ballotnumber'";
        $result = mysql_query($query) or die(mysql_error());
                                                                                                                  
	$results['opposingtotal'] = 0;   
        do {
                $line = mysql_fetch_array($result, MYSQL_BOTH);
                        if ($line != null) {
                                $id = $line['committeeID'];
                                $results['opposers']["$id"]['name'] = $line['name'];
                                                                                                                     
                                $equery = "SELECT SUM(amount) FROM contributed_to ".
                                                "WHERE committeeID = '$id'";
                                $eresult = mysql_query($equery) or die(mysql_error());
                                $eline = mysql_fetch_array($eresult, MYSQL_BOTH);
                                $results['opposers']["$id"]['contributions'] = $eline['SUM(amount)'] + 0;
                                $results['opposingtotal'] = $results['opposingtotal'] + $eline['SUM(amount)'];

			}
        } while ($line != null);

?>
