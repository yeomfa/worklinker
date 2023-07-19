<?php

// $conn = mysqli_connect($hostname, $username, $password, $db_name);

// if (!$conn) {
//     die('Error in database connection ' . mysqli_connect_error());
// }

// echo 'Connect successfully';

class Database {
	private $hostname;
	private $username;
	private $password;
	private $dbname;
	private $conn;

	public function __construct() {
		$this->hostname = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->dbname = 'work_centers';
	}

	public function connect() {
		try {
			$this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;", "$this->username", "$this->password");
		} catch (PDOException $e) {
			die('Error in database connection ' . $e->getMessage());
		}
	}

	public function runQuery($sql = "") {
		if ($sql != "") {
			$query = $this->conn->prepare($sql);
			$result = $query->execute();
			$table = $query->fetchAll(PDO::FETCH_ASSOC);
			$this->conn = null;

			return $table;
		} else {
			return 0;
		}
	}

	public function runUpdate($sql = "") {
		if ($sql != "") {
			$query = $this->conn->prepare($sql);
			$query->execute();
			$lastInsertId = $this->conn->lastInsertId();

			$this->conn = null;

			return $lastInsertId;
		} else {
			return 0;
		}
	}
}