<?php

class model_module
{
	protected $db;
	protected $router;
	protected $config;

	public function __construct()
	{
		$this->config = registry::register("config");
		$this->router = registry::register("router");
		$this->db = registry::register('database');
	}
}