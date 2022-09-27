<?php
require_once 'response.php';
require_once 'database.php';

class crud extends Database

{

	public function get_info($params, $table)
	{
		$resp = parent::getDB($table, $params);
		return $resp;
	}

	public function get_ID($id, $table)
	{
		$resp = parent::getDBID($table, $id);
		return $resp;
	}

	public function insert_info($params, $table)
	{
		return parent::insertDB($table, $params);
	}

	public function delete_info($id, $table)
	{
		$affected_rows = parent::deleteDB($table, $id);

		if ($affected_rows == 0) {
			$response = array(
				'result' => 'error',
				'details' => 'No hubo cambios'
			);

			Response::result(200, $response);
			exit;
		}
	}

	public function update_info($id, $params, $table)
	{
		$affected_rows = parent::updateDB($table, $id, $params);

		if ($affected_rows == 0) {
			$response = array(
				'result' => 'error',
				'details' => 'No hubo cambios'
			);

			Response::result(200, $response);
			exit;
		}
	}
}
