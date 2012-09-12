<?php
	if (auth()) {
		echo "\n\t\t\t hello ".get_session('username')." ";
?>
<a href="process/login.php?a=logout">[logout]</a>
<?php
		if (isadmin()) {
			echo "\t\t\t<a href=\"?p=includes/admin.php\">[admin tools]</a>\n";
			if (debug($debug)) {
				echo "<br />\t\t\t <a href=\"?p=debug\">[debug - throw error]</a>";
				echo " <a href=\"includes/dump.php\">[debug - dump all]</a>";
			}
		}
?>
			<br />
			<div class="mtitle">Forms</div>
<?php
		if (debug($debug)) {
			echo "\t\t\t<div class=\"mitem\">";
			echo "<a href=\"?p=dat/form.php&amp;i=-1\">[debug- test form]</a></div>\n";	
		}

		foreach($form_names as $index => $form){
			echo "\t\t\t<div class=\"mitem\">-";
			echo "<a href=\"?p=dat/form.php&amp;i=$index\">$form</a></div>\n";
		}
?>
			<div class="mtitle">Reports</div>
<?php
		if (debug($debug)) {
			echo "\t\t\t<div class=\"mitem\">";
			echo "<a href=\"?p=dat/report.php&amp;i=-1\">[debug - test report]</a></div>\n";	
		}
		
		foreach($report_names as $index => $report){
			echo "\t\t\t<div class=\"mitem\">-";
			echo "<a href=\"?p=dat/report.php&amp;i=$index\">$report</a></div>\n";
		}
	} else {
		echo "\t\t\tPlease login first\n";
	}
?>