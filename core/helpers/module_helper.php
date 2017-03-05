<?php

define("MODULE", true);

function module_load($module)
{
	$config = registry::register("config");
	$module = strtolower($module);
	$module_path = $config->module_path . $module . '_module' . "/";

	if(!file_exists($module_path . $module . '.php'))
	{
		echo 'Brak modułu.';
	}

	include_once($module_path . $module . '.php');
	return ;
}