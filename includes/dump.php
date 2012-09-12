<?php
	require("constants.php");
	
	if (isadmin() && debug($debug)) {
		echo "session:  ".session_id()."<br /><br />";
		echo "sesion info: <br />";
		print_r($_SESSION);
		echo "<br /><br />debug backtrace:<br />";
		print_r(debug_backtrace());
	}
?>

<br />
<a href="../">Return to Front Page</a>