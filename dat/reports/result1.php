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
		<tr><td>Contribution Class</td><td>Amount</td></tr>
		<tr><td>-------------------------------------------</td><td>---------</td></tr>
		<tr>
			<td>Under 500$ each recieved this period</td>
			<td align="right">$<?php echo $data['small']; ?></td>
		</tr>
		<tr>
			<td>Between $500 and $1000</td>
			<td align="right">$<?php echo $data['sm']; ?></td>
		</tr>
                <tr>
                        <td>Between $1001 and $5000</td>
                        <td align="right">$<?php echo $data['medium']; ?></td>
                </tr>
                <tr>
                        <td>More than $5000</td>
                        <td align="right">$<?php echo $data['large']; ?></td>
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
