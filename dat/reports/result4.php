<?php
	$data = get_session('results');
?>
	From: <?php echo $data['fromdate']; ?> Through: <?php echo $data['todate']; ?><br />
	<br />
	Office: <?php echo $data['office']; ?> <br />
	Year: <?php echo $data['year']; ?><br />
	<br />
	<table border="0">
		<tr><td>Candidate Name</td><td>Contributions</td><td>Expenditures</td></tr>
		<tr><td>--------------</td><td>-------------</td><td>------------</td></tr>
<?php
		foreach($data['candidates'] as $candidate) {
			echo "<tr><td>".$candidate['name']."</td><td>$".$candidate['contributions']."</td>" .
				"<td>$".$candidate['expenditures']."</td></tr>";
		}

?>
	</table>
