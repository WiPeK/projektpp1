<?php

class admin_article extends admin_module
{
	public function __construct()
	{
		parent::__construct();
		$_SESSION['err'] = '';
	}

	public function index()
	{
		$count = $this->articlemodel->count_articles();
		$perpage = 10;
        
		if ((int)$count > $perpage) {
			
        	$pages = ceil((int)$count/(int)$perpage);

        	$url = base_url() . 'admin_article/index/';

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
        
        $this->data['articles'] = $this->articlemodel->get_to_admin($perpage, $offset);


		$this->data['subview'] = 'admin/article/index.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function edit($id = false)
	{
		if($id)
		{
			$this->data['article'] = $this->articlemodel->get_article($id);			
		}
		else
		{
			$this->data['article'] = $this->articlemodel->get_new();
		}

		$this->data['article_parent'] = str_replace(' ','_',$this->pagemodel->get_article_parents());

		if(isset($_POST['submit']))
		{
			$title = trim(xss_clean($_POST['title']));
			$pubdate = trim(xss_clean($_POST['pubdate']));
			$category = trim(xss_clean($_POST['category']));
			$tags = trim(xss_clean($_POST['tags']));
			$parent_page = trim(xss_clean($_POST['parent_page']));
			$body = $_POST['body'];

			if(min_length($title, 1) && max_length($title, 100) && max_length($category, 100) && max_length($tags, 100) && max_length($parent_page, 100))
			{
				if(!isset($_POST['logo_exist']))
				{
					$upload_path = realpath('') . '/assets/articles_logos/';
					$tmp = explode('.', $_FILES['article_logo']['name']);
					$tnm = md5(time());
					$upload_file = $upload_path . $tnm . '.' . end($tmp);
				}

				if(strlen($this->data['article']['logo'] < 5))
				{
					if(!isset($_POST['logo_exist']) && (($_FILES['article_logo']['type'] == 'image/gif' || $_FILES['article_logo']['type'] == 'image/jpeg' || $_FILES['article_logo']['type'] == 'image/jpg' || $_FILES['article_logo']['type'] == 'image/png') && $_FILES['article_logo']['size'] <= 30000000))
					{
							if(move_uploaded_file($_FILES['article_logo']['tmp_name'], $upload_file))
							{
								$logo = 'assets/articles_logos/' . $tnm . '.' . end($tmp);
								if($this->articlemodel->save($id , $title, $pubdate, $category, $tags, $parent_page, $body, $logo))
								{
									$_SESSION['err'] .= 'Artykuł został zapisany.';
									redirect('admin_article');
								}
								else
								{

									$_SESSION['err'] .= 'Artykuł nie został zapisany.';
									redirect('admin_article');
								}

							}
							else
								$_SESSION['err'] .= 'Logo nie zostało zapisane.';
						}
						


					}
					else
						$_SESSION['err'] .= 'Niewłaściwy typ pliku [gif|png|jpeg|jpg] lub za duży rozmiar [3mb].';			
					
				}
				else
				{
					$logo = $this->data['article']['logo'];
					if($this->articlemodel->save($id , $title, $pubdate, $category, $tags, $parent_page, $body, $logo))
					{
						$_SESSION['err'] .= 'Artykuł został zapisany.';
						redirect('admin_article');
					}
					else
					{

						$_SESSION['err'] .= 'Artykuł nie został zapisany.';
						redirect('admin_article');
					}
				}
		}

		$this->data['subview'] = 'admin/article/edit.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function deletelogo($id)
	{
		$logo = $this->articlemodel->get_logo($id);
		if($logo)
		{
			unlink(realpath('') . $logo);
			$this->articlemodel->delete_logo($id);
		}
		redirect('admin_article');
	}

	public function delete($id)
	{
		$logo = $this->articlemodel->get_logo($id);
		if($logo)
		{
			unlink(realpath('') . $logo);
			$this->articlemodel->delete_logo($id);
		}
		$this->articlemodel->delete($id);
		redirect('admin_article');
	}
}