<?php

// Default Controller
define('DEFAULT_CONTROLLER', $defaultController['controllerName']);
define('DEFAULT_METHOD', $defaultMethod['methodName']);

// Directory
define('DIRECTORY_APP', 'app');
define('DIRECTORY_LIBRARY_ENGINE', 'engine/libs');
define('DIRECTORY_HELPER_ENGINE', 'engine/helper');

define('DIRECTORY_CONTROLLER', DIRECTORY_APP . DIRECTORY_SEPARATOR . $appDirectory['controllers']);
define('DIRECTORY_MODEL', DIRECTORY_APP . DIRECTORY_SEPARATOR . $appDirectory['models']);
define('DIRECTORY_VIEW', DIRECTORY_APP . DIRECTORY_SEPARATOR . $appDirectory['views']);
define('DIRECTORY_LIBRARY_APP', DIRECTORY_APP . DIRECTORY_SEPARATOR . $appDirectory['libraries']);
define('DIRECTORY_HELPER_APP', DIRECTORY_APP . DIRECTORY_SEPARATOR . $appDirectory['helper']);

// URL
define('BASE_URL', $urlConf['baseURL']);

// Database
define('DB_DRIVER', $dbConf['driver']);
define('DB_HOST', $dbConf['host']);
define('DB_USERNAME', $dbConf['username']);
define('DB_PASSWORD', $dbConf['password']);
define('DB_NAME', $dbConf['database']);
