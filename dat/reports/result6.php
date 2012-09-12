<?php
	$data = get_session('results');
?>
	Candidate Name: <?php echo $data['candidate']; ?> <br />
	Office: <?php echo $data['office']; ?><br />
	Year: <?php echo $data['year']; ?><br />
	<br />
	<table border="0">
		<tr><td>Committee ID</td><td>Committee Name</td><td>Date Established</td><td>Treasurer</td><td>Chairperson</td><td>Contributions</td></tr>
		<tr><td>-----------</td><td>--------------</td><td>----------------</td><td>---------</td><td>-----------</td><td>-------------</td></tr>
<?php
		foreach($data['committees'] as $id => $committee) {
			echo "<tr><td>".$id."</td><td>".$committee['name']."</td>" .
				"<td>".$committee['date']."</td>".
				"<td>".$committee['treasurer']."</td>".
				"<td>".$committee['chairperson']."</td>".
				"<td>$".$committee['contributions']."</td></tr>";
		}

?>
		<tr><td></td><td></td><td></td><td></td><td colspan="right">total</td><td>$<?php echo $data['total']; ?></td></tr>
	</table>
