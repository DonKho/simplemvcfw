<?php

/**
 * Base controller.
 * All controller class must be extends to this class
 * Controller has a :
 * ~ LoarderObj $_load - for loading model or library
 * ~ ViewObj $_view - for rendering view or passing data to view
 */
class Controller {
	
	protected $_load;
	protected $_view;
	
	public function __construct() {
		$this->_load = new Loader();
		$this->_view = new View();
	}
	
}
