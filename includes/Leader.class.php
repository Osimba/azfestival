<?php

class Leader extends Dbh {

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

		try {
			
			$stmt = $conn->prepare("SELECT * FROM users WHERE name = :leaderName AND password = :password");
			$stmt->bindParam(':leaderName', $leaderName);
			$stmt->bindParam(':password', $password);
			$stmt->execute();

			if($row = $stmt->fetch()) {
				return true;
			} 

			return false;
		} catch (Exception $e) {
			echo "checkUserCredentials Error: " . $e->getMessage();
		}
	}


	public function createPassword($groupName, $password) {

		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("INSERT INTO users (groupName, email, password) VALUES (:groupName, :email, :password)");
			$stmt->bindParam(':groupName', $groupName);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->execute();

			return "Successfully created account!";

		} catch (Exception $e) {
			return "Failed to add user: " . $e->getMessage();
		}

	}

	
}