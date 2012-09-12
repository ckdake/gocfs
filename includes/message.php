<?php
	if (get_session('error') != null) {
		echo "<div class=\"error\">\n";
		echo get_session('error');
		echo "</div><br /><br />";
		update_session('error', 0);
	}
	
	if (get_session('message') != null) {
		echo "<div class=\"message\">\n";
		echo get_session('message');
		echo "</div><br /><br />";
		update_session('message',0);
	}
?>