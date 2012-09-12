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
		<tr><td>Date</td><td>Name of Payee</td><td>Code</td><td>Amount</td></tr>
		<tr><td>----</td><td>-------------</td><td>----</td><td>------</td></tr>
<?php
		foreach($data['code-a'] as $item) {
			echo "<tr><td>".$item['date']."</td><td>".$item['payee']."</td>" .
				"<td>".$item['code']."</td><td>$".$item['amount']."</td></tr>";
		}
                foreach($data['code-c'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['payee']."</td>".
                                "<td>".$item['code']."</td><td>$".$item['amount']."</td></tr>";
                }
                foreach($data['code-f'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['payee']."</td>".
                                "<td>".$item['code']."</td><td>$".$item['amount']."</td></tr>";
                }
                foreach($data['code-o'] as $item) {
                        echo "<tr><td>".$item['date']."</td><td>".$item['payee']."</td>".
                                "<td>".$item['code']."</td><td>$".$item['amount']."</td></tr>";
                }
?>
		<tr><td></td><td colspan="2" align="right">total:</td>
			<td>$<?php echo $data['total']; ?></td></tr>
	</table>
