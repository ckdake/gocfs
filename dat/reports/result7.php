<?php
	$data = get_session('results');
?>
	Year: <?php echo $data['year']; ?><br />
	Proposition: <?php echo $data['propositionnumber']; ?><br />
	<br />
	Description<br />
	-<?php echo $data['description']; ?><br />
	SUPPORTING
	<table border="0">
		<tr><td>Committee ID</td><td>Committee Name</td><td>Contributions</td></tr>
		<tr><td>------------</td><td>--------------</td><td>-------------</td></tr>
<?php
		foreach($data['supporters'] as $id => $supporter) {
			echo "<tr><td>".$id."</td><td>".$supporter['name']."</td>" .
				"<td>$".$supporter['contributions']."</td></tr>";
		}

?>
		<tr><td></td><td align="right">total</td><td>$<?php echo $data['supportingtotal']; ?></td></tr>
	</table>
	OPPOSING
        <table border="0">
                <tr><td>Committee ID</td><td>Committee Name</td><td>Contributions</td></tr>
                <tr><td>------------</td><td>--------------</td><td>-------------</td></tr>
<?php
                foreach($data['opposers'] as $id => $opposer) {
                        echo "<tr><td>".$id."</td><td>".$opposer['name']."</td>" .
                                "<td>$".$opposer['contributions']."</td></tr>";
                }
                                                                                                              
?>
		<tr><td></td><td align="right">total</td><td>$<?php echo $data['opposingtotal']; ?></td></tr>
	</table>
