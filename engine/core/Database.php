<?php

/**
 * Database operation handler that is child of PDO (PHP class)
 */
class Database extends PDO {

	private $_sql;

	/**
	 * @param string $db_type - Database type. eg. MySql, Postgress, etc.
	 * @param string $db_host - Database host. eg. localhost
	 * @param string $db_name - Database name.
	 * @param string $db_username - Database username
	 * @param string $db_password - Database password
	 */
	public function __construct($db_type, $db_host, $db_name, $db_username, $db_password) {
		parent::__construct($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
	}

	/**
	 * Select data from table
	 *
	 * @param string $tableName - Table name
	 * @param array $fieldName - Value is fieldname that you want to get
	 * @param string $where - Where clause. eg. id_article = '1'
	 * @param string $orderBy - Order by
	 * @param int $limit - Limit data to select
	 * @param int $offset - Starting row to select
	 */
	public function select($tableName, $fieldName = array(), $where = '', $orderBy = '', $limit = 0, $offset = null) {

		$sql = "SELECT ";

		$sql .= (!empty($fieldName)) ? implode(', ', $fieldName) : "*";

		$sql .= " FROM $tableName";

		if ($where != "") {
			$sql .= " WHERE $where";
		}

		if ($orderBy != "") {
			$sql .= " ORDER BY $orderBy";
		}

		if ($limit != 0) {

			$sql .= " LIMIT $limit";

			if ($offset != null) {
				$sql .= " OFFSET $offset";
			}

		}

		$sth = $this -> prepare($sql);
		$sth -> execute() or die("$sth->errorInfo()<br/>");
		return $sth -> fetchAll(PDO::FETCH_ASSOC);

	}

	/**
	 * Insert data to table
	 *
	 * @param string $tableName - Table name
	 * @param array $data - Key is filedname and value is value to insert to table
	 */
	public function insert($tableName, $data) {

		ksort($data);

		$fieldName = implode(', ', array_keys($data));
		$paramValues = ':' . implode(', :', array_keys($data));

		$sth = $this -> prepare("INSERT INTO $tableName($fieldName) VALUES($paramValues)");

		foreach ($data as $key => $value) {

			$sth -> bindValue(":$key", $value);

		}

		if ($sth -> execute()) {

			return true;

		} else {

			print_r($sth -> errorInfo());
			exit ;

		}

	}

	/**
	 * Update data in table
	 *
	 * @param string $tableName - Table name
	 * @param array $data - Key is fieldname and value is value that you want to update
	 * @param string $where - Where clause. eg. id_article = '1'
	 */
	public function update($tableName, $data, $where) {

		$fieldValue = '';

		foreach ($data as $key => $value) {
			$fieldValue .= "$key = :$key, ";
		}

		$fieldValue = rtrim($fieldValue, ', ');

		$sth = $this -> prepare("UPDATE $tableName SET $fieldValue WHERE $where");

		foreach ($data as $key => $value) {
			$sth -> bindValue(":$key", $value);
		}

		if ($sth -> execute()) {

			return true;

		} else {

			print_r($sth -> errorInfo());
			exit ;

		}

	}

	/**
	 * Delete data from table
	 *
	 * @param string $tableName - Table name
	 * @param string $where - Where clause. eg. id_article = '1'
	 */
	public function delete($tableName, $where) {

		$sth = $this -> prepare("DELETE FROM $tableName WHERE $where");

		if ($sth -> execute()) {

			return true;

		} else {

			print_r($sth -> errorInfo());
			exit ;

		}

	}

	// Function below is for database explicit processing

	public function xSelect($fieldName = array()) {
		if (!empty($fieldName)) {
			$fields = implode(', ', $fieldName);
			$this -> _sql = "SELECT $fields ";
		} else {
			$this -> _sql = "SELECT * ";
		}
	}

	public function xFrom($tableName) {
		$this -> _sql .= "FROM $tableName ";
	}

	public function xWhere($where) {
		$this -> _sql .= "WHERE $where";
	}

	public function xInnerJoin($tableName, $fieldRelation) {
		$this -> _sql .= "INNER JOIN $tableName ON $fieldRelation";
	}

	public function xFetchAll() {
		$sth = $this -> prepare($this -> _sql);
		if ($sth -> execute()) {
			return $sth -> fetchAll(PDO::FETCH_ASSOC);
		} else {
			print_r($sth -> errorInfo());
			exit ;
		}
	}

}
