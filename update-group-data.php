<?php

include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

	//groupName-content-date-value
	foreach ($_POST['changes'] as $key => $value) {
		$updateArray = explode("-", $value);

		$response = $Group->updateTableData($updateArray[0], $updateArray[1], $updateArray[2], $updateArray[3]);
	}

		echo $response;
}