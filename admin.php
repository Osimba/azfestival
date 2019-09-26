<?php
	include('config.php');

	$leaderTitle = 'yuma-admin';

	
	if($leaderTitle) {
		include("views/v_group-admin.php");
	} else {
		include("views/v_admin.php");
	}

	
?>