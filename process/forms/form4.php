<?php

	$committeeid = $_POST['committeeid'];
	$datepaid = $_POST['paid'];
	$payee = $_POST['payee'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];
	$code = $_POST['code'];

	
	if (($payee != null) && ($datepaid != null) && ($amount != null)) {

		$expenditureid = '';
		
		$result = mysql_query("SELECT MAX(expenditureID) FROM expenditure");
		$line = mysql_fetch_array($result, MYSQL_BOTH);
		if ($line['MAX(expenditureID)'] == null) {
			$expenditureid = 1;
		} else {
			$expenditureid = $line['MAX(expenditureID)'] + 1;
		}

		$query = "INSERT INTO expenditure VALUES('$expenditureid','$code','$description','$datepaid','$amount','$payee','$street','$city','$state','$zip','$committeeid')";	
		$result = mysql_query($query)
			or update_session('error',"ERROR: " . mysql_error());

		$results[1] = "Expenditure successfully processed.";
	} else {
		update_session('error',"ERROR: payee, date, and amount  must have valid values");
	}
?>
