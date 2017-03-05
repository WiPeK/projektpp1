<?php

class admin_dashboard extends admin_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['stats'] = $this->dashmodel->count_stats();
		$this->data['subview'] = 'admin/dashboard/index.php';
		$view = registry::register("view");
        $view->addExternalView('admin/_layout_admin', $this->data); 
	}
}