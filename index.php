<?php
	require("includes/constants.php");
	
	if ($_GET['p'] != null) {
		update_session('content', $_GET['p']);
		update_session('index', $_GET['i']);
		header("Location: ./");
	} else if (get_session('content') == null) {
		update_session('content', "includes/front.php");
		header("Location: ./");
	} 
	
	include("includes/header.php");

	if (auth()) {
		echo "\t\t<td width=\"150\" class=\"primary\">";
		include("includes/menu.php");
		echo "\t\t</td>\n\t\t<td class=\"primary\">\n";
		echo "\t\t\t<div class=\"content\">\n";
		echo "<!-- content div -->\n";
		$error = @include(get_session('content'));
		if ($error != 1) {
			include("includes/error.php");
		}
		echo "\n<!-- end of content div -->";
		echo "\n\t\t\t</div>\n\t\t</td>\n";
	} else {
		echo "\t\t<td colspan=\"2\" class=\"primary\">\n";
		echo "<!-- content div -->\n";
		include("includes/login.php");
		echo "\n<!-- end of content div -->";
		echo "\n\t\t</td>\n";
	}

	include("includes/footer.php");
?>

