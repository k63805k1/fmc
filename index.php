<?php
	require 'config/config.php';
	global $config;
	spl_autoload_register(function ($className){
		$str = lcfirst($className);
		$add = str_replace('_','/',$str);
		include $add.'.php';
	});
	$url = "$_SERVER[REQUEST_URI]";
	$url = substr($url,1);
	$url = explode('/',$url);
	new System_routes($url);
?>