<?php

class Group extends Dbh {

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