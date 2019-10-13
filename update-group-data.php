<?php

include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {



	if(isset($_POST['changes'])) {
		//groupName-content-date-value
		foreach ($_POST['changes'] as $key => $value) {
			$updateArray = explode("-", $value);

			$response = $Group->updateTableData($updateArray[0], $updateArray[1], $updateArray[2], $updateArray[3]);
			$totalPoints = $Group->getTotalPoints($updateArray[0]);
			$Leader->setGospelPoints($updateArray[0], $totalPoints);
		}
	} else if(isset($_POST['attendance'])) {
		//groupName-content-date-value
		foreach ($_POST['attendance'] as $key => $value) {
			$updateArray = explode("-", $value);

			$response = $Leader->updateAttendanceData($updateArray[0], $updateArray[2], $updateArray[3]);
		}
	} else {
		$response = "Nothing to Update";
	}

		echo $response;
}