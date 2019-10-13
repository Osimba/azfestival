<?php include("views/headers/header.php"); ?>

<script type="text/javascript">
	
	/* Charts Code */
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawTotalChart);

	function drawTotalChart() {
		var totalData = google.visualization.arrayToDataTable([
		  ['', 'Total', { role: 'style'}],
		  <?php 
		  echo "['Unconnected', " . $uTotal . ", 'blue'],";
		  echo "['Connected', " . $cTotal . ", 'red'],";
		  echo "['Baptisms', " . $bTotal . ", '#F2F200'],";
		  echo "['Attendance', " . $aTotal . ", 'green'],";	
		  ?>
		]);

		var view = new google.visualization.DataView(totalData);
		view.setColumns([0, 1, 
			{ calc: 'stringify',
				sourceColumn: 1,
				type: 'string',
				role: 'annotation' }, 2]);

		var options = {
			legend: {position: "none" },
			bar: {groupWidth: '95%'},
			chart: {  	
			    title: '',
			    subtitle: '',
			}
		};


		var chart = new google.visualization.ColumnChart(document.getElementById('az-total-stats'));
		chart.draw(view, options);
	}
</script>

<img src="<?= IMAGE_DIR  ?>background-image-wmt.jpg" class="banner-wmt">

	<div style="text-align: center; padding: 30px;">
		<p><strong>Notice:</strong> If you have questions about the Preaching Festival, please contact Missionary David.</p>
		<p>God Bless You!</p>
	</div>

	<hr>

	<main id="church-stats" class="text-center">

		<h1>Results</h1>
		<hr>
		<h2>Total</h2>

		<div id="az-total-stats" class="zion-stats"></div>

		<!--
		<div class="row">

			<?php /* foreach($sortedLeaderArray as $key=>$groupArray) { ?>

				<div class="zion-stats" id="group-stats<?php echo $key; ?>"></div>
					
			<?php } */?>

		</div>
		-->

			
		
		<h1>Bear Good Fruit!</h1>
		<img src="images/wah.png" class="img-thumbnail">

	</main>
	
<?php include("views/headers/footer.php"); ?>