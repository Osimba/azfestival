<?php include("views/headers/header.php"); ?>

<script type="text/javascript">
	
	/* Charts Code */
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawNorthAmericaChart);
	google.charts.setOnLoadCallback(drawWestCoastChart);
	google.charts.setOnLoadCallback(drawArizonaChart);

	function drawNorthAmericaChart() {
		var totalData = google.visualization.arrayToDataTable([
		  ['', 'Total', { role: 'style'}, 'Goal'],
		  <?php 
		  echo "['Unconnected', " . $northAmericaData['unconnected'] . ", 'blue', " . $northAmericaGoal['unconnected'] . "],";
		  echo "['Connected', " . $northAmericaData['connected'] . ", 'red', " . $northAmericaGoal['connected'] . "],";
		  echo "['Baptisms', " . $northAmericaData['baptism'] . ", '#F2F200', " . $northAmericaGoal['baptism'] . "],";
		  echo "['Attendance', " . $northAmericaData['attendance'] . ", 'green', " . $northAmericaGoal['attendance'] . "],";	
		  ?>
		]);

		var view = new google.visualization.DataView(totalData);
		view.setColumns([0, 1, 
			{ calc: calcPercentage,
				type: 'string',
				role: 'annotation' }, 2]);

		function calcPercentage(dataTable, rowNum) {
			return dataTable.getValue(rowNum, 1) + ' - ' + (100 * dataTable.getValue(rowNum, 1)/dataTable.getValue(rowNum, 3)).toFixed(1) + '%';
		}

		var options = {
			legend: {position: "none" },
			bar: {groupWidth: '95%'},
			chart: {  	
			    title: '',
			    subtitle: '',
			}
		};


		var chart = new google.visualization.ColumnChart(document.getElementById('na-total-stats'));
		chart.draw(view, options);
	}

	function drawWestCoastChart() {
		var totalData = google.visualization.arrayToDataTable([
		  ['', 'Total', { role: 'style'}, 'Goal'],
		  <?php 
		  echo "['Unconnected', " . $westCoatAssociationData['unconnected'] . ", 'blue', " . $westCoatAssociationGoal['unconnected'] . "],";
		  echo "['Connected', " . $westCoatAssociationData['connected'] . ", 'red', " . $westCoatAssociationGoal['connected'] . "],";
		  echo "['Baptisms', " . $westCoatAssociationData['baptism'] . ", '#F2F200', " . $westCoatAssociationGoal['baptism'] . "],";
		  echo "['Attendance', " . $westCoatAssociationData['attendance'] . ", 'green', " . $westCoatAssociationGoal['attendance'] . "],";	
		  ?>
		]);

		var view = new google.visualization.DataView(totalData);
		view.setColumns([0, 1, 
			{ calc: calcPercentage,
				type: 'string',
				role: 'annotation' }, 2]);

		function calcPercentage(dataTable, rowNum) {
			return dataTable.getValue(rowNum, 1) + ' - ' + (100 * dataTable.getValue(rowNum, 1)/dataTable.getValue(rowNum, 3)).toFixed(1) + '%';
		}

		var options = {
			legend: {position: "none" },
			bar: {groupWidth: '95%'},
			chart: {  	
			    title: '',
			    subtitle: '',
			}
		};


		var chart = new google.visualization.ColumnChart(document.getElementById('wca-total-stats'));
		chart.draw(view, options);
	}

	function drawArizonaChart() {
		var totalData = google.visualization.arrayToDataTable([
		  ['', 'Total', { role: 'style'}, 'Goal'],
		  <?php 
		  echo "['Unconnected', " . $arizonaData['unconnected'] . ", 'blue', " . $arizonaGoal['unconnected'] . "],";
		  echo "['Connected', " . $arizonaData['connected'] . ", 'red', " . $arizonaGoal['connected'] . "],";
		  echo "['Baptisms', " . $arizonaData['baptism'] . ", '#F2F200', " . $arizonaGoal['baptism'] . "],";
		  echo "['Attendance', " . $arizonaData['attendance'] . ", 'green', " . $arizonaGoal['attendance'] . "],";	
		  ?>
		]);

		var view = new google.visualization.DataView(totalData);
		view.setColumns([0, 1, 
			{ calc: calcPercentage,
				type: 'string',
				role: 'annotation' }, 2]);

		function calcPercentage(dataTable, rowNum) {
			return dataTable.getValue(rowNum, 1) + ' - ' + (100 * dataTable.getValue(rowNum, 1)/dataTable.getValue(rowNum, 3)).toFixed(1) + '%';
		}

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
		
		<br><hr><br>

		<h2>North America</h2>
		<p>(Last Updated <?= $lastUpdate ?>)</p>

		<div id="na-total-stats" class="zion-stats"></div>

		<h2>West Coast Association</h2>
		<p>(Last Updated <?= $lastUpdate ?>)</p>

		<div id="wca-total-stats" class="zion-stats"></div>

		<h2>Arizona</h2>
		<p>(Real Time)</p>

		<div id="az-total-stats" class="zion-stats"></div>

		<br><hr><br>
		
		<h1>Bear Good Fruit!</h1>
		<img src="images/wah.png" class="img-thumbnail">

	</main>
	
<?php include("views/headers/footer.php"); ?>