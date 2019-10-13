<?php

class Leader extends Dbh {

	public function getAllLeadersInfo() {

		$conn = $this->connect();
		$leaderRow = array();

		try {

			$stmt = $conn->prepare("SELECT name, title, goal FROM leader");
			$stmt->execute();

			$i = 0;

			while($row = $stmt->fetch()) {

				$leaderRow[$i]['name'] = $row['name'];
				$leaderRow[$i]['title'] = $row['title'];
				$leaderRow[$i]['goal'] = $row['goal'];
				
				$i++;
			}

			return $leaderRow;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}

	public function getLeaderInfo($leaderName) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT title, goal, gospel_points, group_type FROM leader WHERE name = :leaderName");
			$stmt->bindParam(':leaderName', $leaderName);
			$stmt->execute();

			if($row = $stmt->fetch()) {
				$leaderRow['title'] = $row['title'];
				$leaderRow['goal'] = $row['goal'];
				$leaderRow['gospel_points'] = $row['gospel_points'];
				$leaderRow['group_type'] = $row['group_type'];
			}

			return $leaderRow;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}

	}

	public function getLeaderAttendance($leaderName) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT * FROM attendance WHERE name = :leaderName");
			$stmt->bindParam(':leaderName', $leaderName);
			$stmt->execute();

			if($row = $stmt->fetch()) {
				$leaderRow['1015T'] = $row['1015T'];
				$leaderRow['1019M'] = $row['1019M'];
				$leaderRow['1019A'] = $row['1019A'];
				$leaderRow['1019E'] = $row['1019E'];
				$leaderRow['1022T'] = $row['1022T'];
				$leaderRow['1026M'] = $row['1026M'];
				$leaderRow['1026A'] = $row['1026A'];
				$leaderRow['1026E'] = $row['1026E'];
				$leaderRow['total'] = $row['total'];
			}

			return $leaderRow;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function updateAttendanceData($leaderName, $date, $value) {

		$conn = $this->connect();

		$sql = "UPDATE attendance SET " . $date . "=? WHERE name=?"; 

		try {

			$stmt = $conn->prepare($sql);
			$stmt->execute([$value, $leaderName]);

			$this->updateTotalAttendance($leaderName);

			return "Updated successfully";

		
		} catch (Exception $e) {
			echo $e->getMessage();

			return "There seems to be an error. Please try again!";
		}	

	}

	private function updateTotalAttendance($leaderName) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("UPDATE attendance SET total = 1015T + 1019M + 1019A + 1019E + 1022T + 1026M + 1026A + 1026E WHERE name=:leaderName");
			$stmt->bindParam(":leaderName", $leaderName);
			$stmt->execute();
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}



	public function getGroups($type) {

		$conn = $this->connect();
		$leaderRow = array();

		try {

			$stmt = $conn->prepare("SELECT name, title, goal, gospel_points FROM leader WHERE group_type = :type");
			$stmt->bindParam(":type", $type);
			$stmt->execute();

			$i = 0;

			while($row = $stmt->fetch()) {

				$leaderRow[$i]['name'] = $row['name'];
				$leaderRow[$i]['title'] = $row['title'];
				$leaderRow[$i]['goal'] = $row['goal'];
				$leaderRow[$i]['gospel_points'] = $row['gospel_points'];
				
				$i++;
			}

			return $leaderRow;
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}

	public function getPercentageToGoal($leaderName) {

		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT gospel_points * 100 / goal as percent FROM leader WHERE name = :leaderName");
			$stmt->bindParam(':leaderName', $leaderName);
			$stmt->execute();

			if($row = $stmt->fetch()) {
				$leaderRow['percent'] = $row['percent'];
			}

			return number_format($leaderRow['percent'], 1, '.', '');
			
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function setGospelPoints($leaderName, $gospelPoints) {

		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("UPDATE leader SET gospel_points = :gospelPoints WHERE name = :leaderName");
			$stmt->bindParam(':gospelPoints', $gospelPoints);
			$stmt->bindParam(':leaderName', $leaderName);
			
			$stmt->execute();

		} catch (Exception $e) {
			return "Error: " . $e->getMessage();
		}
	}

	public function getGroupTitle($name) {

		$user = array();
		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("SELECT title FROM leader WHERE name = :name");
			$stmt->bindParam(':name', $name);
			$stmt->execute();

			if($row = $stmt->fetch()) {
				return $row['title'];
			} 

		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function checkLeaderCredentials($leaderName, $password) {
		$user = array();
		$conn = $this->connect();

		$hash = $this->getLeaderPassword($leaderName);

		if(!$hash['error']) {

			$auth = password_verify($password, $hash['password']);

		} else {
			$auth = false;
		}

		return $auth;
	}


	public function createPassword($leaderName, $password) {

		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("UPDATE leader SET password = :password WHERE name = :leaderName");
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':leaderName', $leaderName);
			
			$stmt->execute();

			return "Successfully added password!";

		} catch (Exception $e) {
			return "Error: " . $e->getMessage();
		}

	}


	/**
	 * Get's leader password from database
	 * 
	 * @access private
	 * @param  string
	 * @return string
	 */
	private function getLeaderPassword($leaderName) {

		$conn = $this->connect();


		try {

			$stmt = $conn->prepare("SELECT password FROM leader WHERE name = :leaderName");
			$stmt->bindParam(':leaderName', $leaderName);
			$stmt->execute();

			$row = $stmt->fetch();
			$row['error'] = false;
				
		} catch (Exception $e) {

			echo "Error: " . $e->getMessage();
		}



		return $row;
		
	}

	
}