<?php
	//this is where you print out your results.  
	//get_session('results') is the array you stored previously.

	$data = get_session('results');
?>
	From: <?php echo $data['fromdate']; ?> Through: <?php echo $data['todate']; ?><br />
	<br />
	Candidate: <?php echo $data['candidate']; ?> <br />
	Office: <?php echo $data['office']; ?> <br />
	Year: <?php echo $data['year']; ?><br />
	<br />
	<table border="0">
		<tr><td>Expenditure Class</td><td>Amount</td></tr>
		<tr><td>-------------------------------------------</td><td>---------</td></tr>
		<tr>
			<td>Under 100$ each made this period</td>
			<td align="right">$<?php echo $data['small']; ?></td>
		</tr>
		<tr>
			<td>$100 or more for each made this period</td>
			<td align="right">$<?php echo $data['big']; ?></td>
		</tr>
		<tr><td colspan="2"></td></tr>
		<tr>
			<td align="right">Total:</td>
			<td align="right">$<?php echo $data['periodtotal']; ?></td>
		</tr>
		<tr><td colspan="2"></td></tr>
		<tr>
			<td>Total expenditures made to through date:</td>
			<td align="right">$<?php echo $data['total']; ?></td>
		</tr>
	</table>
