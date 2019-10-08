<?php 

	include("config.php");

	session_start();

	//check if leader is logged in
	if(isset($_SESSION['leader'])) {

		
		//check for inactivity
		if(time() > $_SESSION['last_active'] + $config['session_timeout']) {
			session_destroy();
			header('location: ./login-admin.php?timeout');
		} else {
			$_SESSION['last_active'] = time();
		}


		$groupWeek[1] = $Group->getWeekTable(923, 928, $_SESSION['leader']);
		$groupWeek[2] = $Group->getWeekTable(929, 1005, $_SESSION['leader']);
		$groupWeek[3] = $Group->getWeekTable(1006, 1012, $_SESSION['leader']);
		$groupWeek[4] = $Group->getWeekTable(1013, 1019, $_SESSION['leader']);
		$groupWeek[5] = $Group->getWeekTable(1020, 1026, $_SESSION['leader']);
		$groupWeek[6] = $Group->getWeekTable(1027, 1029, $_SESSION['leader']);

		


	} else {
		//if not logged in redirect
		header('location: ./login-admin.php?unauthorized');
	}

	include("views/v_admin.php");

?>