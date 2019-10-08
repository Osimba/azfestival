<?php 
	include("views/headers/header.php");
	$percentages = array();
?>

<script type="text/javascript">
	
	/* Charts Code */
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawGroupChart0);
	google.charts.setOnLoadCallback(drawGroupChart1);
	google.charts.setOnLoadCallback(drawGroupChart2);
	google.charts.setOnLoadCallback(drawGroupChart3);
	google.charts.setOnLoadCallback(drawGroupChart4);

	function drawGroupChart0() {
		var oldData = new google.visualization.DataTable();

		oldData.addColumn('string', 'Name');
		oldData.addColumn('number', 'Goal');
		

        oldData.addRows([
	      <?php 
	      	foreach($sortedLeaderArray[0] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['goal'] . "],";
	      	}
	      ?>
	      
	    ]);

	    var newData = new google.visualization.DataTable();
		
		newData.addColumn('string', 'Name');
		newData.addColumn('number', 'Gospel Points');	

        newData.addRows([
	      <?php 
	      	foreach($sortedLeaderArray[0] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['gospel_points'] . "],"; 

	      	}
	      ?>
	    ]);


	    var colChartDiff = new google.visualization.ColumnChart(document.getElementById('group-stats0'));

	    var options = {
	    	legend: { position: 'none' },
	    	diff: { 
	    		oldData: { 
	    			tooltip: { prefix: 'Goal'} 
	    		},
	    		newData: { 
	    			widthFactor: 1,
	    			tooltip: { prefix: 'Points'}
	    		} 
	    	}  
	    };

	    var diffData = colChartDiff.computeDiff(oldData, newData);

	    colChartDiff.draw(diffData, options);

	}


	function drawGroupChart1() {
		// Some raw data (not necessarily accurate)
        var oldData = google.visualization.arrayToDataTable([
	      ['Name', 'Goal'],
	      <?php 
	      	foreach($sortedLeaderArray[1] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['goal'] . "],"; 

	      	}
	      ?>
	      
	    ]);

	    var newData = google.visualization.arrayToDataTable([
	      ['Name', 'Gospel Points'],
	      <?php 
	      	foreach($sortedLeaderArray[1] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['gospel_points'] . "],"; 

	      	}
	      ?>
	    ]);


	    var colChartDiff = new google.visualization.ColumnChart(document.getElementById('group-stats1'));

	    var options = {
	    	legend: { position: 'none' },
	    	diff: { 
	    		oldData: { 
	    			tooltip: { prefix: 'Goal'} 
	    		},
	    		newData: { 
	    			widthFactor: 1,
	    			tooltip: { prefix: 'Points'}
	    		} 
	    	}  
	    };

	    var diffData = colChartDiff.computeDiff(oldData, newData);
	    colChartDiff.draw(diffData, options);

	}	


	function drawGroupChart2() {
		// Some raw data (not necessarily accurate)
        var oldData = google.visualization.arrayToDataTable([
	      ['Name', 'Goal'],
	      <?php 
	      	foreach($sortedLeaderArray[2] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['goal'] . "],"; 

	      	}
	      ?>
	      
	    ]);

	    var newData = google.visualization.arrayToDataTable([
	      ['Name', 'Gospel Points'],
	      <?php 
	      	foreach($sortedLeaderArray[2] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['gospel_points'] . "],"; 

	      	}
	      ?>
	    ]);

	    var colChartDiff = new google.visualization.ColumnChart(document.getElementById('group-stats2'));

	    var options = {
	    	legend: { position: 'none' },
	    	diff: { 
	    		oldData: { 
	    			tooltip: { prefix: 'Goal'} 
	    		},
	    		newData: { 
	    			widthFactor: 1,
	    			tooltip: { prefix: 'Points'}
	    		} 
	    	}  
	    };

	    var diffData = colChartDiff.computeDiff(oldData, newData);
	    colChartDiff.draw(diffData, options);

	}	


	function drawGroupChart3() {
		// Some raw data (not necessarily accurate)
        var oldData = google.visualization.arrayToDataTable([
	      ['Name', 'Goal'],
	      <?php 
	      	foreach($sortedLeaderArray[3] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['goal'] . "],"; 

	      	}
	      ?>
	      
	    ]);

	    var newData = google.visualization.arrayToDataTable([
	      ['Name', 'Gospel Points'],
	      <?php 
	      	foreach($sortedLeaderArray[3] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['gospel_points'] . "],"; 

	      	}
	      ?>
	    ]);

	    var colChartDiff = new google.visualization.ColumnChart(document.getElementById('group-stats3'));

	    var options = {
	    	legend: { position: 'none' },
	    	diff: { 
	    		oldData: { 
	    			tooltip: { prefix: 'Goal'} 
	    		},
	    		newData: { 
	    			widthFactor: 1,
	    			tooltip: { prefix: 'Points'}
	    		} 
	    	}  
	    };

	    var diffData = colChartDiff.computeDiff(oldData, newData);
	    colChartDiff.draw(diffData, options);

	}

	function drawGroupChart4() {
		// Some raw data (not necessarily accurate)
        var oldData = google.visualization.arrayToDataTable([
	      ['Name', 'Goal'],
	      <?php 
	      	foreach($sortedLeaderArray[4] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['goal'] . "],"; 

	      	}
	      ?>
	      
	    ]);

	    var newData = google.visualization.arrayToDataTable([
	      ['Name', 'Gospel Points'],
	      <?php 
	      	foreach($sortedLeaderArray[4] as $groupArray) {
				echo "['" . ucfirst($groupArray) . "', " . $Leader->getLeaderInfo($groupArray)['gospel_points'] . "],"; 

	      	}
	      ?>
	    ]);

	    var colChartDiff = new google.visualization.ColumnChart(document.getElementById('group-stats4'));

	    var options = {
	    	legend: { position: 'none' },
	    	diff: { 
	    		oldData: { 
	    			tooltip: { prefix: 'Goal'} 
	    		},
	    		newData: { 
	    			widthFactor: 1,
	    			tooltip: { prefix: 'Points'}
	    		} 
	    	}  
	    };

	    var diffData = colChartDiff.computeDiff(oldData, newData);
	    colChartDiff.draw(diffData, options);

	}

</script>

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

	<main id="church-stats" class="text-center">

		<h1>Acheivements</h1>

		<?php for($i = 0; $i < sizeof($sortedLeaderArray); $i++) { ?>

		<a href="#"><h2 class="group-section-title"><?= $groupTypes[$i] ?></h2></a>

		<div class="row group-percentage-data">

			<?php foreach($sortedLeaderArray[$i] as $leaderName) { ?>

				<div class="leader-percentage col-md-4"><h3><?php echo ucfirst($leaderName) . ": " . $Leader->getPercentageToGoal($leaderName) . "%"; ?></h3></div>

			<?php } ?>

		</div>

		<?php } ?>

		<hr>

		<h1>Results</h1>
		<img src="<?php echo IMAGE_DIR . 'legend.JPG'; ?>">

		<div class="row">

			<?php foreach($sortedLeaderArray as $key=>$groupArray) { ?>

				<div class="zion-stats" id="group-stats<?php echo $key; ?>"></div>
					
			<?php } ?>

		</div>

			
		
		<h1>Bear Good Fruit!</h1>
		<img src="images/wah.png" class="img-thumbnail">

	</main>
	
<?php include("views/headers/footer.php"); ?>