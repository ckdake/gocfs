<?php
	$report_name = $report_names[get_session('index')];
	if (get_session('index') == -1) {
		$report_name = "debug form";
	}
	
	if (!is_array(get_session('results'))) {
		include("includes/message.php");
		echo "<div class=\"title\">".$report_name."</div>";
		echo "<form action=\"process/report.php\" method=\"post\" enctype=\"multipart/form-data\">";
		if (get_session('index') == -1) {
			include("dat/reports/report.php");
		} else {
			include("dat/reports/report".get_session('index').".php");
		}	
		echo "</form>";
	} else {
		echo "<div class=\"title\">".$report_name." - Results</div>";;
		if (get_session('index') == -1) {
			include("dat/reports/result.php");
		} else {
			include("dat/reports/result".get_session('index').".php");
		}
		update_session('results',null);
	}
?>
