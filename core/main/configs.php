<?php 

class configs
{
	private $config;

	public function __construct()
	{
		if(!file_exists("core/config/config.php"))
		{
			include_once("../../../core/config/config.php");
		}
		else
		{
			include_once("core/config/config.php");
		}

		if(isset($configs))
			$this->config = $configs;
	}

	public function __get($var)
	{
		return $this->config[$var];
	}
}