<?php

class Router {

	private $_error = array();

	private $_url;

	private $_controllerPath;
	private $_controllerName;
	private $_methodName;
	private $_param = array();

	public function __construct() {

		if (isset($_GET['url'])) {

			$this -> _url = rtrim($_GET['url'], '/');

		}

		$this -> _controllerPath = DIRECTORY_CONTROLLER;

		$this -> scanUrl();

	}

	private function scanUrl() {

		if ($this -> _url) {

			$urlExploded = explode('/', $this -> _url);

			foreach ($urlExploded as $key => $value) {

				if (is_dir($this -> _controllerPath . DIRECTORY_SEPARATOR . $value)) {

					$this -> _controllerPath .= DIRECTORY_SEPARATOR . $value;
					continue;

				}

				if (is_null($this -> _controllerName)) {

					if (file_exists($this -> _controllerPath . DIRECTORY_SEPARATOR . $value . ".php")) {

						$this -> _controllerName = $value;
						continue;

					} else {

						$this -> _error[] = "File controller <i><b>{$value}</b></i> pada folder <i><b>{$this->_controllerPath}</b></i> tidak ditemukan";
						return;

					}

				}

				if (is_null($this -> _methodName)) {

					$this -> _methodName = $value;
					continue;

				}

				$this -> _param[] = $value;

			}

		}

		if (is_null($this -> _controllerName)) {

			$this -> _controllerName = DEFAULT_CONTROLLER;

		}

		if (is_null($this -> _methodName)) {

			$this -> _methodName = DEFAULT_METHOD;

		}

	}

	public function getControllerPath() {

		if (!is_null($this -> _controllerPath)) {

			return $this -> _controllerPath;

		}

	}

	public function getControllerName() {

		if (!is_null($this -> _controllerName)) {

			return $this -> _controllerName;

		}

	}

	public function getMethodName() {

		if (!is_null($this -> _methodName)) {

			return $this -> _methodName;

		}

	}

	public function getParam() {

		if (!empty($this -> _param)) {

			return $this -> _param;

		}

	}

	public function isValid() {

		if (is_null($this -> _controllerName)) {

			$this -> _error[] = "Nama Controller Tidak ditemukan";

		}

		if (is_null($this -> _methodName)) {

			$this -> _error[] = "Nama Method Tidak ditemukan";

		}

		if (empty($this -> _error)) {

			return true;

		} else {

			return false;

		}

	}

	public function getError() {

		return $this -> _error;

	}

}
