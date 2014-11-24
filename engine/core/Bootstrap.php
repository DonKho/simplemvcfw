<?php

/**
 * Apps wrapper
 */
class Bootstrap {

	private $_controller;
	private $_router;

	public function __construct() {
		$this -> _router = new Router();
	}

	/**
	 * Initiation and running apps
	 */
	public function runApp() {

		if ($this -> _router -> isValid()) {

			require $this -> _router -> getControllerPath() . DIRECTORY_SEPARATOR . $this -> _router -> getControllerName() . ".php";

			$controllerName = ucfirst($this -> _router -> getControllerName());

			$this -> _controller = new $controllerName();

			if (method_exists($this -> _controller, $this -> _router -> getMethodName())) {
				
				if (!empty($this->_router->getParam())) {
					
					// Calling controller method with parameter
					call_user_func_array(array($this->_controller, $this->_router->getMethodName()), $this->_router->getParam());
					
				} else {
					
					// Calling controller method without parameter
					$this -> _controller -> {$this->_router->getMethodName()}();
					
				}
				

			} else {

				$this -> callError("Method <i><b>{$this->_router->getMethodName()}</i></b> tidak ditemukan pada kelas <i><b>{$this->_router->getControllerName()}</i></b>");

			}

		} else {

			$this -> callError($this -> _router -> getError());

		}
	}

	/**
	 * Calling and showing error message
	 *
	 * @param String $errorMessage - Error message
	 */
	private function callError($errorMessage) {

		echo "Sorry, you got the error page :'(<hr/>";

		if (is_array($errorMessage)) {

			foreach ($errorMessage as $key => $value) {

				echo "- {$value}<br/>";

			}

		} else {

			echo "- {$errorMessage}";

		}

	}

}
