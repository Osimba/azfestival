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
				
			}

			return $dayData;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}

	public function drawTable($weekNumber, $weekData, $groupName) {
		$output = '';
		$totalGP = array();

		$output .= "<table id=week'" . $weekNumber . "'>
						<thead class='table-header'>
							<tr class='btn-primary'>
								<th class='contents'>Week " . $weekNumber . "</th>";


		foreach ($weekData as $date => $content) {
			$output .= "<th class='date'>" . substr_replace(strval($date), "/", -2, 0) . "</th>";
		}


		$output .= "<th>Total</th>
					<th>Gospel Points</th>
					</tr>
					</thead>";

		$output .= "<tbody class='table-body'>";
		
		//Connected
		$output .= "<tr>
						<td class='contents'>Connected</td>";

		$total = 0;				
		foreach($weekData as $date => $content) {
			$total += $content['connected'];
			$totalGP['connected'] = $total * CONNECTED_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-connected-" . $date . "' min='0' value='" . $content['connected'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['connected'] . "</td>
					</tr>";

		//Unconnected
		$output .= "<tr>
						<td class='contents'>Unconnected</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['unconnected'];
			$totalGP['unconnected'] = $total * UNCONNECTED_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-unconnected-" . $date . "' min='0' value='" . $content['unconnected'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['unconnected'] . "</td>
					</tr>";

		//Come & See
		$output .= "<tr>
						<td class='contents'>Come & See</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['come_see'];
			$totalGP['come_see'] = $total * COME_SEE_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-come_see-" . $date . "' min='0' value='" . $content['come_see'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['come_see'] . "</td>
					</tr>";

		//Baptism
		$output .= "<tr>
						<td class='contents'>Baptism Count</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['baptism'];
			$totalGP['baptism'] = $total * BAPTISM_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-baptism-" . $date . "' min='0' value='" . $content['baptism'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['baptism'] . "</td>
					</tr>";

		//Bible Studies
		$output .= "<tr>
						<td class='contents'>Bible Studies</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['bible_study'];
			$totalGP['bible_study'] = $total * BIBLE_STUDY_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-bible_study-" . $date . "' min='0' value='" . $content['bible_study'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['bible_study'] . "</td>
					</tr>";

		//EA Confirmations
		$output .= "<tr>
						<td class='contents'>EA Confirmations</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['elohim_academy'];
			$totalGP['elohim_academy'] = $total * ELOHIM_ACADEMY_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-elohim_academy-" . $date . "' min='0' value='" . $content['elohim_academy'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['elohim_academy'] . "</td>
					</tr>";

		//MS Confirmations
		$output .= "<tr>
						<td class='contents'>MS Confirmations</td>";

		$total = 0;				
		
		foreach($weekData as $date => $content) {
			$total += $content['moses_staff'];
			$totalGP['moses_staff'] = $total * MOSES_STAFF_VALUE;
			$output .= "<td><input class='content-data' type='number' name='" . $groupName . "-moses_staff-" . $date . "' min='0' value='" . $content['moses_staff'] . "' required onfocus='this.select()'></td>";
		}
							
		$output .= "<td class='week-total'>" . $total . "</td>
					<td class='" . $groupName . "-week-points'>" . $totalGP['moses_staff'] . "</td>
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

	private function getWeeklyContentTotal($content, $firstDayOfWeek, $lastDayOfWeek, $groupName) {

		$conn = $this->connect();
		$dayData = array();

		$sql = "SELECT SUM(" . $content . ") AS total FROM " . $groupName . " WHERE day >= :firstDayOfWeek AND day <= :lastDayOfWeek";

		try {

			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':firstDayOfWeek', $firstDayOfWeek);
			$stmt->bindParam(':lastDayOfWeek', $lastDayOfWeek);
			$stmt->execute();

			if($row = $stmt->fetch()) {

				return $row['total'];
				
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getTotalPoints($groupName) {

		$conn = $this->connect();

		$sql = "SELECT SUM(connected) as connected, 
						SUM(unconnected) as unconnected, 
						SUM(come_see) as come_see,
						SUM(baptism) as baptism,
						SUM(bible_study) as bible_study,
						SUM(elohim_academy) as elohim_academy,
						SUM(moses_staff) as moses_staff,
						(SUM(connected) * " . CONNECTED_VALUE . " + SUM(unconnected) * " . UNCONNECTED_VALUE . " + SUM(come_see) * " . COME_SEE_VALUE . " + SUM(baptism) * " . BAPTISM_VALUE . " + SUM(bible_study) * " . BIBLE_STUDY_VALUE . " + SUM(elohim_academy) * " . ELOHIM_ACADEMY_VALUE . " + SUM(moses_staff) * " . MOSES_STAFF_VALUE . " ) as total 
				FROM " . $groupName;

		try {

			$stmt = $conn->prepare($sql);
			$stmt->execute();

			if($row = $stmt->fetch()) {

				return $row['total'];
				
			}
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}