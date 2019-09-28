<?php
	include('config.php');

	session_start();

	$alert['error'] = '';


	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$leader = $_POST['leader-name'];
		$password = $_POST['password'];


		if($Leader->checkLeaderCredentials($leader, $password)) {

			$_SESSION['leader'] = $leader;
			$_SESSION['last_active'] = time();

			header('location: ./admin.php');
		} else {
			header('location: ./login-admin.php?wrongCredentials');
		}

	} else {

		if(isset($_GET['logout'])) {
			session_unset();
			session_destroy();

			header('location: ./login-admin.php');
		} 

		if(isset($_SESSION['leader'])) {
			header('location: ./admin.php');
		} 

		if(isset($_GET['unauthorized'])) {
	        $alert['error'] = 'Please login to view this page!';
	    }

	    if(isset($_GET['wrongCredentials'])) {
	        $alert['error'] = 'Incorrect password!';
	    }
	    
	    if(isset($_GET['timeout'])) {
	        $alert['error'] = 'Session timed out! Please login again!';
	    }
	}

	
	include("views/v_login-admin.php");

	
?>