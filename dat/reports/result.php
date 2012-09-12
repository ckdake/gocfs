<?php
	//this is where you print out your results.  
	//get_session('results') is the array you stored previously.

	foreach(get_session('results') as $user) {
		echo $user.",";
	}
?>