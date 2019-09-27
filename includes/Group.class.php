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


		switch ($groupName) {
			case 'yuma':
				try {

					$stmt = $conn->prepare("SELECT * FROM yuma WHERE day >= :firstDayOfWeek AND day <= :lastDayOfWeek");
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
				break;
			default:
				return "Zion not found.";
				break;

		}


		
	}

	public function drawTable($weekNumber, $weekData) {
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
			$output .= "<td><input type='number' name='connected-data' min='0' value='" . $content['connected'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Unconnected
		$output .= "<tr>
						<td class='contents'>Unconnected</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='unconnected-data' min='0' value='" . $content['unconnected'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Come & See
		$output .= "<tr>
						<td class='contents'>Come & See</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='come_see-data' min='0' value='" . $content['come_see'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Baptism
		$output .= "<tr>
						<td class='contents'>Baptism Count</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='baptism-data' min='0' value='" . $content['baptism'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Bible Studies
		$output .= "<tr>
						<td class='contents'>Bible Studies</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='bible_study-data' min='0' value='" . $content['bible_study'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//EA Confirmations
		$output .= "<tr>
						<td class='contents'>EA Confirmations</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='elohim_academy-data' min='0' value='" . $content['elohim_academy'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//MS Confirmations
		$output .= "<tr>
						<td class='contents'>MS Confirmations</td>";

		foreach($weekData as $date => $content) {
			$output .= "<td><input type='number' name='moses_staff-data' min='0' value='" . $content['moses_staff'] . "'></td>";
		}
							
		$output .= "<td class='week-total'></td>
					<td class='week-points'></td>
					</tr>";

		//Closing Table
		$output .= "</tbody>
					</table>";


		return $output;

	}

	public function getAllZions() {

		$conn = $this->connect();
		$zionRow = array();

		//Pull data from database
		try {

			$stmt = $conn->prepare("SELECT * FROM zion");
			$stmt->execute();

			$i = 0;
			while($row = $stmt->fetch()) {

				$zionRow[$i]['name'] = $row['name'];
				$zionRow[$i]['connected'] = $row['connected'];
				$zionRow[$i]['unconnected'] = $row['unconnected'];
				$zionRow[$i]['baptisms'] = $row['baptisms'];
				
				$i++;
			}
			return $zionRow;
			
			
		} catch (Exception $e) {
			echo "Unable to get data from database: " . $e->getMessage();
		}
	}

	public function getZionInfo($name) {
		
		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT * FROM zion WHERE name=?");
			$stmt->execute([$name]);
			$row = $stmt->fetch();
				
			$zionRow['name'] = $row['name'];
			$zionRow['connected'] = $row['connected'];
			$zionRow['unconnected'] = $row['unconnected'];
			$zionRow['baptisms'] = $row['baptisms'];
			
			return $zionRow;

			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	public function getConnected($name) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT connected FROM zion WHERE name=?");
			$stmt->execute([$name]);
			$zionCount = $stmt->fetch();

			return $zionCount['connected'];
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getUnconnected($name) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT unconnected FROM zion WHERE name=?");
			$stmt->execute([$name]);
			$zionCount = $stmt->fetch();

			return $zionCount['unconnected'];
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getBaptisms($name) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT baptisms FROM zion WHERE name=?");
			$stmt->execute([$name]);
			$zionCount = $stmt->fetch();

			return $zionCount['baptisms'];
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function countUpdate($name, $connected, $unconnected, $baptisms) {

		$conn = $this->connect();

		$countConnected = $this->getConnected($name);
		$countUnconnected = $this->getUnconnected($name);
		$countBaptisms = $this->getBaptisms($name);


		try {

			$countConnected += $connected;
			$countUnconnected += $unconnected;
			$countBaptisms += $baptisms;

			$stmt = $conn->prepare("UPDATE zion SET connected=?, unconnected=?, baptisms=? WHERE name=?");
			$stmt->execute([$countConnected, $countUnconnected, $countBaptisms, $name]);

		
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function countSubtract($name, $connected, $unconnected, $baptisms) {

		$conn = $this->connect();

		$countConnected = $this->getConnected($name);
		$countUnconnected = $this->getUnconnected($name);
		$countBaptisms = $this->getBaptisms($name);

		try {

			$countConnected -= $connected;
			$countUnconnected -= $unconnected;
			$countBaptisms -= $baptisms;

			$stmt = $conn->prepare("UPDATE zion SET connected=?, unconnected=?, baptisms=? WHERE name=?");
			$stmt->execute([$countConnected, $countUnconnected, $countBaptisms, $name]);

		
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}