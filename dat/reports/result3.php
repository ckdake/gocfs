<?php
	$data = get_session('results');
?>
	From: <?php echo $data['fromdate']; ?> Through: <?php echo $data['todate']; ?><br />
	<br />
	Candidate: <?php echo $data['candidate']; ?> <br />
	Office: <?php echo $data['office']; ?> <br />
	Year: <?php echo $data['year']; ?><br />
	<br />
	<table border="0">
		<tr><td>Date</td><td>Contributor Name</td><td>Class</td><td>Amount</td></tr>
		<tr><td>----</td><td>-------------</td><td>----</td><td>------</td></tr>
<?php
		foreach($data['individual'] as $item) {
			echo "<tr><td>".$item['date']."</td><td>".$item['name']."</td>" .
				"<td>".$item['class']."</td><td>$".$item['amount']."</td></tr>";
		}
                foreach($data['corporation'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['name']."</td>".
                                "<td>".$item['class']."</td><td>$".$item['amount']."</td></tr>";
                }
                foreach($data['labor'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['name']."</td>".
                                "<td>".$item['class']."</td><td>$".$item['amount']."</td></tr>";
                }
                foreach($data['party'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['name']."</td>".
                                "<td>".$item['class']."</td><td>$".$item['amount']."</td></tr>";
                }
?>
		<tr><td></td><td colspan="2" align="right">total:</td>
			<td>$<?php echo $data['total']; ?></td></tr>
	</table>
