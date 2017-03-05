<?php

if(!defined('DS')) define('DS', '/');

$aURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$aURL .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$sl = substr($aURL, -1);
$nURL = $sl != '/' ? $aURL . '/' : $aURL;

define('SERVER_ADDRESS', $nURL);

$configs = array(
	'default_controller' => "home",
	// paths
	'helper_path' => "core" . DS . "helpers" . DS,
	'library_path' => "core" . DS . "library" . DS,
	'driver_path' => "core" . DS . "driver" . DS,
	// database
	'mysql_host' => '',
	'port' => '3306',
	'username' => '',
	'password' => '',
	'database' => '',
	//paths
	'controller_path' => "application".DS."controllers".DS,
	'model_path' => "application".DS."models".DS,
	'view_path' => "application".DS."views".DS,
	'media_path' => "application".DS."media".DS,
	'module_path' => "application".DS."library".DS,
);