<?php include("views/headers/header.php") ?>

<main id="admin-page" class="container-fluid text-center">
	<h1><?php echo $Leader->getGroupTitle($_SESSION['leader']); ?> Admin Input</h1>

	<?php 
		for($i = 1; $i <= 6; $i++) {
			echo $Group->drawTable($i, $groupWeek[$i], $_SESSION['leader']);
	 ?>
	<br><hr><br>

<?php } ?>


<button id="update-data" class="btn btn-primary btn-block">Update</button>
</main>

<script src="https://code.jquery.com/jquery-3.4.1.js"
			integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			crossorigin="anonymous"></script>

<script src="js/app.js"	type="text/javascript"></script>	

<?php include("views/headers/footer.php"); ?>