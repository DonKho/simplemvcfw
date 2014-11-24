<?php

class Loader {

	public function __construct() {

	}

	public function model($modelFile) {

		if (file_exists(DIRECTORY_MODEL . DIRECTORY_SEPARATOR . $modelFile . '_model.php')) {

			require DIRECTORY_MODEL . DIRECTORY_SEPARATOR . $modelFile . '_model.php';

			$modelExplode = explode('/', $modelFile);

			$modelName = ucfirst($modelExplode[count($modelExplode)-1]) . '_Model';

			$modelObject = new $modelName();

			return $modelObject;

		} else {

			exit("<hr/>Model file <i><b>({$modelFile}.php)</b></i> that you try to load is not exists.<hr/>");

		}

	}

	public function lib($libraryFile) {

		if (file_exists(DIRECTORY_LIBRARY_ENGINE . DIRECTORY_SEPARATOR . $libraryFile . '.php')) {

			require DIRECTORY_LIBRARY_ENGINE . DIRECTORY_SEPARATOR . $libraryFile . '.php';

			$libExplode = explode('/', $libraryFile);

			$libName = ucfirst($libExplode[count($libExplode)-1]);

			$libObject = new $libName();

			return $libObject;

		} else if(file_exists(DIRECTORY_LIBRARY_APP . DIRECTORY_SEPARATOR . $libraryFile . '.php')) {
			
			require DIRECTORY_LIBRARY_APP . DIRECTORY_SEPARATOR . $libraryFile . '.php';

			$libExplode = explode('/', $libraryFile);

			$libName = ucfirst($libExplode[count($libExplode)-1]);

			$libObject = new $libName();

			return $libObject;
			
		} else {

			exit("<hr/>Library file <i><b>({$libraryFile}.php)</b></i> that you try to load is not exists.<hr/>");

		}

	}
	
	public function helper($helperFile) {
		
		if (file_exists(DIRECTORY_HELPER_ENGINE . DIRECTORY_SEPARATOR . $helperFile . '.php')) {

			require DIRECTORY_HELPER_ENGINE . DIRECTORY_SEPARATOR . $helperFile . '.php';

			$helperExplode = explode('/', $helperFile);

			$helperName = ucfirst($helperExplode[count($helperExplode)-1]);

			$helperObject = new $helperName();

			return $helpObject;

		} else if(file_exists(DIRECTORY_HELPER_APP . DIRECTORY_SEPARATOR . $helperFile . '.php')) {
			
			require DIRECTORY_HELPER_APP . DIRECTORY_SEPARATOR . $helperFile . '.php';

			$helperExplode = explode('/', $helperFile);

			$helperName = ucfirst($helperExplode[count($helperExplode)-1]);

			$helperObject = new helperName();

			return $helperObject;
			
		} else {

			exit("<hr/>Helper file <i><b>({$helperFile}.php)</b></i> that you try to load is not exists.<hr/>");

		}
		
	}

}
