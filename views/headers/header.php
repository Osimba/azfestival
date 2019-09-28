<!DOCTYPE html>
<html lang="en">
<head>
	<title>AZ Festival Dashboard</title>

	<!-- JavaScript for Charts -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    

	<!--CSS Style Sheets -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<? echo ROOT_DIR . 'css/style.css'; ?>">


</head>
<body>

		<header>

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
				<a class="navbar-brand" href="<?= ROOT_DIR ?>">AZ Festival Dashboard</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				    <div class="navbar-nav ml-auto">

						<?php if(isset($_SESSION["leader"])): ?>
							<a class="nav-link" href="<?= ROOT_DIR ?>">All Group Stats</a>
							<a class="nav-link" href="<? echo ROOT_DIR . 'login-admin.php?logout=true'; ?>">Logout</a>
						<?php else:?>
							<a class="nav-item nav-link" href="<? echo ROOT_DIR . 'login-admin.php'; ?>">Admin</a>
						<?php endif; ?>

					</div>
				
			</div><!-- #navbarNav -->
			</nav> 
		</header>