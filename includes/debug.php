<?php
	if (isadmin()) {
		if ($debug_avaliable) {
			echo "\t\t\t<br />\n\t\t\t[debug: ";
			if (debug($debug)) {
				echo "on/";
				echo "<a href=\"process/admin.php?a=debugoff\">off</a>]";
			} else {
				echo "<a href=\"process/admin.php?a=debugon\">on</a>";
				echo "/off]";
			}
		} else if (debug($debug)) {
			echo "\n\t\t\t<br />\n\t\t\t[debug on]";
		}
	}
?>
