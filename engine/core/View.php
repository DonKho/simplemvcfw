<?php

class View {
	
	protected $_data = array();
	
	public function __construct() {
		
	}
	
	public function setData($key, $val) {
		$this->_data[$key] = $val;
	}
	
	public function getData($key = false) {
		if ($key) {
			return $this->_data[$key];
		}
		return $this->_data;
	}
	
	public function render($viewFile) {
		
		$viewPathFile = DIRECTORY_VIEW . DIRECTORY_SEPARATOR . $viewFile . '.php';
		
		if (file_exists($viewPathFile)) {
			
			require $viewPathFile;
			
		} else {
			
			exit("<hr/>View file <i><b>({$viewFile}.php)</b></i> that you try to render is not exists.<hr/>");
			
		}
		
	}
	
}
