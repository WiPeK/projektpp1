<?php

Abstract class front_module extends controller
{
	public $data = array();
	public $err;

	public function __construct()
	{
		parent::__construct();
		
		$this->data['cmscfg'] = $this->dashmodel->get_cmsconfig();
		$this->data['menu'] = $this->pagemodel->get_menu();
		$this->data['tags_data'] = $this->articlemodel->get_tags_data();
		$this->data['fimages'] = $this->gallerymodel->get_images_footer();
		$this->data['newest_arts'] = $this->articlemodel->newest_art();
        $this->data['popular_arts'] = $this->articlemodel->popular_art();
        $this->main->load('head_helper');
	}

	
}