<?php

class router
{
	private $controller;
	private $action;
	private $params;

	public function __construct()
	{
		$config = registry::register("configs");

		$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

		if(empty($segments[0]) || $segments[0] == $config->default_controller)
		{
			$this->controller = $config->default_controller;
			if($segments[1] == "galeria") $this->action = "index";
			else
				$this->action = "index";
		}
		else
		{
			$path = $_SERVER['REQUEST_URI'];
			$this->controller = $segments[0];
			if($segment[1] == "home" && $segments[2] == "galeria")
				$this->action = "index";
			else
				$this->action = isset($segments[1]) ? $segments[1] : "index";
		}

		if(isset($segments[2]))
		{
			$this->params[0] = $segments[2];
		}
		if(isset($segments[3]))
		{
			$this->params[1] = $segments[3];
		}
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getParams()
	{
		return $this->params;
	}
}