<?php include("views/headers/header.php") ?>

<main id="admin-page" class="container-fluid text-center">
	<h1><?php echo $Leader->getGroupTitle($_SESSION['leader']); ?> Admin Attendance Input</h1>

<table>
	<thead>
		<tr>
		<?php foreach ($attendanceDates as $date) {
			echo "<th class='date'>" . substr_replace($date, '/', -3, 0) . "</th>";
			echo "";
		} ?>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php foreach ($attendanceDates as $date) {
			echo "<td><input class='content-data' type='number' name='" . $_SESSION['leader'] . "-attendance-" . $date . "' min='0' value='" . $leaderAttendance[$date] . "' required onfocus='this.select()'></td>";
			echo "";
		} ?>
		<td><?= $leaderAttendance['total'] ?></td>
		</tr>
	</tbody>
</table>

<br><hr><br>

<div class="text-center">
	<img src="<?= IMAGE_DIR ?>loader.gif" id="loader" width="100px" style="display: none;">
</div>
<br>
<button id="update-attendance-data" class="btn btn-primary btn-block">Update</button>
</main>


<?php include("views/headers/footer.php"); ?>