<?php
	$data = get_session('results');
?>
	From: <?php echo $data['fromdate']; ?> Through: <?php echo $data['todate']; ?><br />
	<br />
	Year: <?php echo $data['year']; ?><br />
	<br />
	<table border="0">
		<tr><td>Party Name</td><td>Contributions</td><td>Expenditures</td></tr>
		<tr><td>--------------</td><td>-------------</td><td>------------</td></tr>
<?php
		foreach($data['parties'] as $name => $party) {
			echo "<tr><td>".$name."</td><td>$".$party['contributions']."</td>" .
				"<td>$".$party['expenditures']."</td></tr>";
		}

?>
	</table>
