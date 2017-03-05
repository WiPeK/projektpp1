<?php

Abstract class admin_module extends controller
{
	public $data = array();
	public $err;

	public function __construct()
	{
		parent::__construct();

        $this->main->load('head_helper');
        $this->main->load('validation_helper');
        $this->main->load('pagination_helper');
		if($this->admin_access() === false)
		{
			redirect('');
		}

		$this->data['cmscfg'] = $this->dashmodel->get_cmsconfig();
	}

	public function admin_access()
	{
		if(isset($_SESSION['loggedin']) && isset($_SESSION['mods']) && $_SESSION['loggedin'] && $_SESSION['mods'] === 'admin')
			return true;
		else
			return false;
	}
}