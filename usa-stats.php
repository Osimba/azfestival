<?php
	include('config.php');

	$sortedLeaderArray = array(
		'aisha', 'alma', 'claudia', 'juliana', 'leslie', 
		'daniel', 'devieon', 'jacob', 
		'liliana', 'marcia', 'naria', 'rosana', 
		'jesus', 'lani', 'thomas', 
		'avondale', 'mesa', 'nogales', 'sphoenix', 'surprise', 'tucson', 'yuma');

	$i = 0;

	//Get data for Total
	foreach ($sortedLeaderArray as $leader) {
		$festivalData[$i] = $Group->getWeekTable(1013, 1026, $leader);
		$attendanceData[$i] =  $Leader->getLeaderAttendance($leader);
		$i++;
	}


	$uTotal = 0;
	$cTotal = 0;
	$bTotal = 0;
	$aTotal = 0;

	//Add all data for totals in unconnected, connected, baptisms and attendance
	for ($j = 0; $j < sizeof($sortedLeaderArray); $j++) { 
		
		foreach($festivalData[$j] as $value) {
			$uTotal += $value['unconnected'];
			$cTotal += $value['connected'];
			$bTotal += $value['baptism'];
		}

		foreach ($attendanceData[$j] as $value) {
			$aTotal += $value;
		}
	}

	

	
	
	include("./views/v_usa-stats.php");
