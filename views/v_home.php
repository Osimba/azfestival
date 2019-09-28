<?php 
	include("views/headers/header.php");
	$leaderArray = $Leader->getAllLeadersInfo();
?>

<div class="banner">
		<div class="overlay">
			<h1>I'm Sorry Please Forgive Us</h1> 
			<h2>Preaching Festival</h2>

			<h2>37 Days</h2>
		</div>
	</div>

	<div style="text-align: center; padding: 30px;">
		<p><strong>Notice:</strong> If you have questions about the Preaching Festival, please contact Missionary David.</p>
		<p>God Bless You!</p>
	</div>

	<hr>

	<!--
	<section>
		<h1>Acheivements</h1>
	</section>
	-->

	<main id="church-stats" class="container text-center">
		<h1>Results</h1>
		<p>Still Under Construction - I'm sorry, please forgive me...</p>

		<div class="row">

			<?php 
				foreach($leaderArray as $leaderInfo) {
					$totalPoints = $Group->getTotalPoints($leaderInfo['name']);
					$Leader->setGospelPoints($leaderInfo['name'], $totalPoints) 
			?>

				<div class="col-md-6">
					<h2><?= $leaderInfo['title'] ?></h2>
					<h2>Goal: <?= $leaderInfo['goal']?></h2>
					<h2>Current: <?= $totalPoints ?></h2>

					<div class="zion-stats" id="<?= $leaderInfo['name'] ?>-group-stats"></div>
				</div>
			<?php } ?>

		</div>

		
		
		
		<h1>Bear Good Fruit!</h1>
		<img src="images/wah.png" class="img-thumbnail">

	</main>
	
<?php include("views/headers/footer.php"); ?>