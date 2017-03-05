<?php

class search extends front_module
{

	public function __construct()
	{
		parent::__construct();
	}

	public function results()
	{
			if(isset($_POST['search_input']) && !empty($_POST['search_input']))
			{
				$this->main->load('validation_helper');
				$query = trim($_POST['search_input']);
				$query = xss_clean($_POST['search_input']);
				if(min_length($query, 3) && alpha_numeric($query))
				{
					$this->data['search_data_art'] = $this->searchmodel->get_search_art($query);
					$this->data['search_data_pg'] = $this->searchmodel->get_search_pg($query);

					$view = registry::register("view");
					$this->data['subview'] = 'templates/search_results.php';
					$this->view->addExternalView('_m_layout', $this->data);
					
				}
				else
				{
					$this->data['subview'] = 'templates/search_results.php';
					$this->view->addExternalView('_m_layout', $this->data);
				}
			}
			

			
	}

	public function tags_menager($tag)
	{
		$this->data['search_data'] = $this->searchmodel->get_tags_data($tag);
		$view = registry::register("view");
		$this->data['subview'] = 'templates/search.php';
		$this->view->addExternalView('_m_layout', $this->data);
	}

	public function category_menager($category)
	{
		$this->data['search_data'] = $this->searchmodel->get_category_data($category);
		$this->data['subview'] = 'templates/search.php';
		$view = registry::register("view"); 
		$view->addExternalView('_m_layout', $this->data);
	}

	public function date_menager($date)
	{
		$this->data['search_data'] = $this->searchmodel->get_date_data($date);
		$this->data['subview'] = 'templates/search.php';
		$view = registry::register("view");
		$this->view->addExternalView('_m_layout', $this->data);
	}
}