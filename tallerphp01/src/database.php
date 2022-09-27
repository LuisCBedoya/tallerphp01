<?php

class Database
{
	private $connection;

	public function __construct()
	{
		$this->connection = new mysqli('127.0.0.1', 'root', '', 'tallerphp01', '3306');

		if($this->connection->connect_errno){
			echo 'Error de conexión a la base de datos';
			exit;
		}
	}

	public function getDB($table, $extra = null)
	{
		$query = "SELECT * FROM $table";

		if($extra != null){
			$query .= ' WHERE';
			foreach ($extra as $key => $condition) {
				$query .= ' '.$key.' = "'.$condition.'"';
				if($extra[$key] != end($extra)){
					$query .= " AND ";
				}
			}
		}

		$results = $this->connection->query($query);
		$resultArray = array();

		foreach ($results as $value) {
			$resultArray[] = $value;
		}

		return $resultArray;
	}

	public function getDBID($table, $id)
	{
		$query = "SELECT * FROM $table ";
		$query .= ' WHERE id = '.$id;
	

		$results = $this->connection->query($query);
		$resultArray = array();

		foreach ($results as $value) {
			$resultArray[] = $value;
		}

		return $resultArray;
	}
	public function insertDB($table, $data)
	{
		$fields = implode(',', array_keys($data));
		$values = '"';
		$values .= implode('","', array_values($data));
		$values .= '"';

		$query = "INSERT INTO $table (".$fields.') VALUES ('.$values.')';
		$this->connection->query($query);

		return $this->connection->insert_id;
	}

	public function updateDB($table, $id, $data)
	{	
		$query = "UPDATE $table SET ";
		foreach ($data as $key => $value) {
			$query .= "$key = '$value'";
			if(sizeof($data) > 1 && $key != array_key_last($data)){
				$query .= " , ";
			}
		}

		$query .= ' WHERE id = '.$id;

		$this->connection->query($query);

		if(!$this->connection->affected_rows){
			return 0;
		}

		return $this->connection->affected_rows;
	}

	public function deleteDB($table, $id)
	{
		$query = "DELETE FROM $table WHERE id = $id";
		$this->connection->query($query);

		if(!$this->connection->affected_rows){
			return 0;
		}

		return $this->connection->affected_rows;
	}
}
