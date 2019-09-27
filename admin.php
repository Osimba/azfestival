<?php
	include('config.php');

	$leaderTitle = 'yuma-admin';

	
	if($leaderTitle) {

		$yumaWeek[1] = $Group->getWeekTable(923, 928, 'yuma');
		$yumaWeek[2] = $Group->getWeekTable(929, 1005, 'yuma');
		$yumaWeek[3] = $Group->getWeekTable(1006, 1012, 'yuma');
		$yumaWeek[4] = $Group->getWeekTable(1013, 1019, 'yuma');
		$yumaWeek[5] = $Group->getWeekTable(1020, 1026, 'yuma');
		$yumaWeek[6] = $Group->getWeekTable(1027, 1029, 'yuma');

		echo $Group->drawTable(1, $yumaWeek[1]);
		
		include("views/v_group-admin.php");


	} else {
		include("views/v_admin.php");
	}

	
?>