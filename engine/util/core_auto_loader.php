<?php

spl_autoload_register(function($className){
	if (file_exists('engine/core/' . ucfirst($className) . '.php')) {
		require 'engine/core/' . ucfirst($className) . '.php';
	} else if (file_exists('engine/helper/' . ucfirst($className) . '.php')) {
		require 'engine/helper/' . ucfirst($className) . '.php';
	}
});