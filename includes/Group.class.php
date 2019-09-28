<?php

class Group extends Dbh {

	public function getTableData() {
		$conn = $this->connect();
		$dayData = array();

		try {

			$stmt = $conn->prepare("SELECT * FROM yuma");
			$stmt->execute();

			while($row = $stmt->fetch()) {

				$dayData[$row['day']]['connected'] = $row['connected'];
				$dayData[$row['day']]['unconnected'] = $row['unconnected'];
				$dayData[$row['day']]['come_see'] = $row['come_see'];
				$dayData[$row['day']]['baptism'] = $row['baptism'];
				$dayData[$row['day']]['bible_study'] = $row['bible_study'];
				$dayData[$row['day']]['elohim_academy'] = $row['elohim_academy'];
				$dayData[$row['day']]['moses_staff'] = $row['moses_staff'];
				$dayData[$row['day']]['daily_total'] = $row['daily_total'];
				
			}

			return $dayData;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getWeekTable($firstDayOfWeek, $lastDayOfWeek, $groupName) {

		$conn = $this->connect();
		$dayData = array();

		$sql = "SELECT * FROM " . $groupName . " WHERE day >= :firstDayOfWeek AND day <= :lastDayOfWeek";

		try {

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':firstDayOfWeek', $firstDayOfWeek);
			$stmt->bindParam(':lastDayOfWeek', $lastDayOfWeek);
			$stmt->execute();

			while($row = $stmt->fetch()) {

				$dayData[$row['day']]['connected'] = $row['connected'];
				$dayData[$row['day']]['unconnected'] = $row['unconnected'];
				$dayData[$row['day']]['come_see'] = $row['come_see'];
				$dayData[$row['day']]['baptism'] = $row['baptism'];
				$dayData[$row['day']]['bible_study'] = $row['bible_study'];
				$dayData[$row['day']]['elohim_academy'] = $row['elohim_academy'];
				$dayData[$row['day']]['moses_staff'] = $row['moses_staff'];
				$dayData[$row['day']]['daily_total'] = $row['daily_total'];
				
			}

			return $dayData;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}

	public function drawTable($weekNumber, $weekData, $groupName) {
		$output = '';

		$output .= "<table id=week'" . $weekNumber . "'>
						<thead class='table-header'>
							<tr class='btn-primary'>
								<th class='contents'>Week " . $weekNumber . "</th>";


		foreach ($weekData as $date => $content) {
			$output .= "<th class='date'>" . $date . "</th>";
		}


		$output .= "<th>Total</th>
					<th>Gospel Points</th>
					</tr>
					</thead>";

		$output .= "<tbody class='table-body'>";
		
		//Connected
		$output .= "<tr>
						<td class='contents'>Connected</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-connected-" . $date . "' min='0' value='" . $content['connected'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Unconnected
		$output .= "<tr>
						<td class='contents'>Unconnected</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-unconnected-" . $date . "' min='0' value='" . $content['unconnected'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Come & See
		$output .= "<tr>
						<td class='contents'>Come & See</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-come_see-" . $date . "' min='0' value='" . $content['come_see'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Baptism
		$output .= "<tr>
						<td class='contents'>Baptism Count</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-baptism-" . $date . "' min='0' value='" . $content['baptism'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Bible Studies
		$output .= "<tr>
						<td class='contents'>Bible Studies</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-bible_study-" . $date . "' min='0' value='" . $content['bible_study'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//EA Confirmations
		$output .= "<tr>
						<td class='contents'>EA Confirmations</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-elohim_academy-" . $date . "' min='0' value='" . $content['elohim_academy'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//MS Confirmations
		$output .= "<tr>
						<td class='contents'>MS Confirmations</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-moses_staff-" . $date . "' min='0' value='" . $content['moses_staff'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Closing Table
		$output .= "</tbody>
					</table>";


		return $output;

	}

	public function updateTableData($groupName, $content, $date, $value) {

		$conn = $this->connect();

		$sql = "UPDATE " . $groupName . " SET " . $content . "=? WHERE day=?"; 

		try {

			$stmt = $conn->prepare($sql);
			$stmt->execute([$value, $date]);

			return "Updated successfully";

		
		} catch (Exception $e) {
			echo $e->getMessage();

			return "There seems to be an error. Please try again!";
		}	

	}

}