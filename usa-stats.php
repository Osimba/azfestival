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
		unset($attendanceData[$i]['total']);
		$i++;
	}

	$arizonaGoal['unconnected'] = 21000;
	$arizonaGoal['connected'] = 500;
	$arizonaGoal['baptism'] = 28;
	$arizonaGoal['attendance'] = 15;

	$arizonaData['unconnected'] = 0;
	$arizonaData['connected'] = 0;
	$arizonaData['baptism'] = 0;
	$arizonaData['attendance'] = 0;

	//Add all data for totals in unconnected, connected, baptisms and attendance
	for ($j = 0; $j < sizeof($sortedLeaderArray); $j++) { 
		
		foreach($festivalData[$j] as $value) {
			$arizonaData['unconnected'] += $value['unconnected'];
			$arizonaData['connected'] += $value['connected'];
			$arizonaData['baptism'] += $value['baptism'];
		}

		foreach ($attendanceData[$j] as $value) {
			$arizonaData['attendance'] += $value;
		}
	}

	/* NA Data */
	$northAmericaGoal['unconnected'] = 2000000;
	$northAmericaGoal['connected'] = 82618;
	$northAmericaGoal['baptism'] = 2762;
	$northAmericaGoal['attendance'] = 1356;

	$northAmericaData['unconnected'] = 445985;
	$northAmericaData['connected'] = 59333;
	$northAmericaData['baptism'] = 243;
	$northAmericaData['attendance'] = 42;

	/* WCA Data */

	$westCoatAssociationGoal['unconnected'] = 700000;
	$westCoatAssociationGoal['connected'] = 7000;
	$westCoatAssociationGoal['baptism'] = 500;
	$westCoatAssociationGoal['attendance'] = 200;

	$westCoatAssociationData['unconnected'] = 144049;
	$westCoatAssociationData['connected'] = 11493;
	$westCoatAssociationData['baptism'] = 79;
	$westCoatAssociationData['attendance'] = 3;

	$lastUpdate = '5:30am ' . 'Oct 16, 2019'; //Date('M d, Y');

	
	include("./views/v_usa-stats.php");
