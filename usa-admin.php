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


		$attendanceDates = ['1015T', '1019M', '1019A', '1019E', '1022T', '1026M', '1026A', '1026E'];
		$leaderAttendance = $Leader->getLeaderAttendance($_SESSION['leader']);

		


	} else {
		//if not logged in redirect
		header('location: ./login-admin.php?unauthorized');
	}

	include("views/v_usa-admin.php");