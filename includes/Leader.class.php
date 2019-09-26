<?php

class Leader extends Dbh {

	public function checkUserCredentials($username, $password) {
		$user = array();
		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
			$stmt->bindParam(':username', $username);
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

	public function getUser($email) {

		$user = array();
		$conn = $this->connect();

		try {

			$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
			$stmt->bindParam(':email', $email);
			$stmt->execute();

			while ($row = $stmt->fetch()) {
	
				$user['username'] = $row['username'];
				$user['password'] = $row['password'];
				
				return $user;
			}

			$user['error'] = "User doesn't exist!";
	
			return $user;
			
		} catch (Exception $e) {

			echo "getUser Error: " . $e->getMessage();
		}
	}


	public function createUser($username, $email, $password) {

		$conn = $this->connect();

		try {
			
			$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $password);
			$stmt->execute();

			return "Successfully created account!";

		} catch (Exception $e) {
			return "Failed to add user: " . $e->getMessage();
		}

	}

	
}