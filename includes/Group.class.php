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

		/*$output .= "<table id=week'" . $weekNumber . "'>
						<thead class='table-header'>
							<tr class='btn-primary'>
								<th class='contents'>Week " . $weekNumber . "</th>";

*/
		foreach ($weekData as $date => $content) {
			$output .= $date . " - Connected - " . $content['connected'] . "<br>";
			$output .= $date . " - Unconnected - " . $content['unconnected'] . "<br>";
			$output .= $date . " - Come & See - " . $content['come_see'] . "<br>";
			$output .= $date . " - Baptism Count - " . $content['baptism'] . "<br>";
			$output .= $date . " - Bible Studies - " . $content['bible_study'] . "<br>";
			$output .= $date . " - EA Signatures - " . $content['elohim_academy'] . "<br>";
			$output .= $date . " - MS Signatures - " . $content['moses_staff'] . "<br>";
			$output .= "<br><br>";
		}


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