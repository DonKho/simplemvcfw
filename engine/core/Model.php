<?php

class Model {
	
	protected $_db;
	protected $_load;
	
	public function __construct() {
		
		$this->_db = new Database(DB_DRIVER, DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
		$this->_load = new Loader();
		
	}
	
}
