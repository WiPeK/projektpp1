<?php 

class article extends front_module
{
	public function __construct()
	{
		parent::__construct();
		$this->main->load('head_helper');
		$this->err = registry::register('sgException');
	}

	public function index($parent_page, $id)
	{
		$this->data['article'] = $this->articlemodel->get_article($id);

		if(!count($this->data['article']))
		{
			$this->err->errorPage(404);
		}

		$requested_parent_page = get_segment(2);
        $requested_id = get_segment(3);
        $set_parent_page = $this->data['article']['parent_page'];
        $set_id = $this->data['article']['id'];

        if ($requested_parent_page != $set_parent_page || $requested_id != $set_id) {
            $this->err->errorPage(404);
        }
        
        $this->data['similar_articles'] = $this->articlemodel->get_similar_articles($this->data['article']['title'],$this->data['article']['body']);

        if($this->articlemodel->add_views($this->data['article']['id']) === true)
        {
        	$view = registry::register("view");
            $this->data['subview'] = 'templates/article.php';
            $view->addExternalView('_m_layout', $this->data); 
        }
	}
}