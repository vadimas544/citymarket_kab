<?php
	//Load Config
	require_once 'config/config.php';
	//Load Helpers
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/sms_helper.php';
    require_once 'helpers/file_helper.php';

	//Autoload Core Libraries
	spl_autoload_register(function($classname){
		require_once 'libs/' . $classname . '.php';
	});