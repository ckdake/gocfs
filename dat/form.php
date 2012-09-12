<?php
	$form_name = $form_names[get_session('index')];
	if (get_session('index') == -1) {
		$form_name = "debug form";
	}

	if (!is_array(get_session('results')) || (get_session('error') != null)) {
		include("includes/message.php");
		echo "<div class=\"title\">".$form_name."</div>";
		echo "<form action=\"process/form.php\" method=\"post\" enctype=\"multipart/form-data\">";
		if (get_session('index') == -1) {
			include("dat/forms/form.php");
		} else { 
			include("dat/forms/form".get_session('index').".php");
		}
		echo "</form>";
	} else {
		echo "<div class=\"title\">".$form_name." - Results</div>";;
		        foreach(get_session('results') as $result) {
		                echo $result."<br />";
		}
		update_session('results',null);
	}
?>
