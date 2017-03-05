<?php

class home extends front_module
{
	public function __construct()
	{
		parent::__construct();
		$err = registry::register('sgException');
		$this->main->load('head_helper');
		$this->main->load('pagination_helper');
	}

	public function index($page = false)
	{
		$this->data['page'] = $this->pagemodel->get_where_slug(get_segment(2));

		if(!count($this->data['page']))
		{
			$this->err->errorPage(404);
		}	

		$method = '_' . $this->data['page']['template'];
		if(method_exists($this, $method))
		{
			$this->$method();
		}
		else
		{
			$this->err->errorPage(100);
		}

		

		$view = registry::register("view");

		if($this->pagemodel->add_views($this->data['page']['id']) === true)
		{
			if($this->data['page']['template'] == 'news_archive' || $this->data['page']['template'] == 'page')
            {
                $this->data['subview'] = 'templates/' . $this->data['page']['template'] . '.php';
            }
            elseif($this->data['page']['template'] == 'static')
            {
            	//zrobić bardziej optymalnie
            	if(get_segment(1) == 'galeria')
            	{
            		$this->data['images'] = $this->gallerymodel->get_images_url();
            	}
                if($this->data['page']['inc_def'] == 1)
                {
                    $view->addExternalView('static/' . $this->data['page']['pageadress'], $this->data);
                }
                elseif($this->data['page']['inc_def'] == 0)
                {
                    $view->addExternalView('static/' . $this->data['page']['pageadress'], $this->data);
                }
            }
            elseif($this->data['page']['template'] === 'homepage')
            {
                $this->data['home_content'] = 1;
                $this->data['random_arts'] = $this->articlemodel->random_art();
                $this->data['post_oad'] = $this->articlemodel->post_of_a_day($this->data['cmscfg']['today_post']);
                $this->data['main_pages'] = $this->pagemodel->get_pages_to_home();
            }
            if($this->data['page']['template'] != 'static')
            {
                $view->addExternalView('_m_layout', $this->data);
            }
		}

	}	

	private function _page(){

    }
    
    private function _static(){

    }

    private function _homepage(){

    }
    
    private function _news_archive(){

        $count = $this->articlemodel->get_to_pagination(str_replace(' ','_',$this->data['page']['title']));

		$perpage = 10;
        
		if ((int)$count > $perpage) {
			
        	$pages = ceil((int)$count/(int)$perpage);

        	$url = base_url() . 'home/' . $this->data['page']['slug'] . '/';

			$this->data['pagination'] = create_links($pages, $url, get_segment(3));
			
			if(empty(get_segment(3)))
				$offset = 0;
			else
				$offset = get_segment(3);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		
        $page_title = str_replace(' ','_',$this->data['page']['title']);
        
        $this->data['articles'] = $this->articlemodel->get_to_news($page_title, $perpage, $offset);

    }
	
}