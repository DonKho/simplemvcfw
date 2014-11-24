<?php

// App Settings
require 'app/conf/app.conf.php';
require 'app/conf/db.conf.php';

// Main Settings
require 'engine/conf/main.conf.php';

// Auto loader
require 'engine/util/core_auto_loader.php';

// Initiation configuration. Param $config : from engine/conf/config.php
// $configuration = new Configuration($config);

$app = new Bootstrap();
$app->runApp();
