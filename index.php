<?php
session_start();
require 'config.php';

spl_autoload_register(function($class) {
	if(file_exists("controller/".$class.".php")) {
		require 'controller/'.$class.'.php';
	} elseif(file_exists("core/".$class.".php")) {
		require 'core/'.$class.'.php';		
	} elseif(file_exists("model/".$class.".php")) {
		require 'model/'.$class.'.php';
	}
});

$core = new Core();
$core->run();

?>