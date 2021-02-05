<?php

require('conn.php');

Class dbconnection{
	public $conn;

	public function __construct(){
		$this->openConnection();
	}

	public function openConnection(){
		$this->conn = mysqli_connect(DBSERVER,DBUSER,DBPASS,DBNAME);
		return $this->conn ? $this->conn : die("cannot connect to server");
	}

	public function performQuery($query){
		$result = mysqli_query($this->conn,$query);
		return $result ? $result : FALSE;
	} 

	public function fetchAll($result){
		$rowSet = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rowSet[] = $row;
		}
		return count($rowSet) >= 1 ? $rowSet : FALSE;
	}

}
?>