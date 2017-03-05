<?php

class view
{
	public function addExternalView($view = "index", $vars)
	{
		$config = registry::register('configs');
		$filepath = $config->view_path . $view . '.php';
		$data = $vars;

		if(file_exists($filepath))
		{
			include_once($filepath);
		}
	}
}