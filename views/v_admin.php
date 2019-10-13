<?php include("views/headers/header.php") ?>

<main id="admin-page" class="container-fluid text-center">
	<h1><?php echo $Leader->getGroupTitle($_SESSION['leader']); ?> Admin Input</h1>

	<p><a href="<? echo ROOT_DIR . 'usa-admin.php'; ?>">Go to Attendance Admin Input</a></p>

	<?php 
		for($i = 1; $i <= 6; $i++) {
			echo $Group->drawTable($i, $groupWeek[$i], $_SESSION['leader']);
	 ?>
	<br><hr><br>

<?php } ?>

<div class="text-center">
	<img src="<?= IMAGE_DIR ?>loader.gif" id="loader" width="100px" style="display: none;">
</div>
<br>
<button id="update-data" class="btn btn-primary btn-block">Update</button>
</main>


<?php include("views/headers/footer.php"); ?>