<?php

class admin_page extends admin_module
{
	public function __construct()
	{
		parent::__construct();
		$this->main->load('validation_helper');
		$_SESSION['err'] = '';
	}

	public function index()
	{
		$this->data['pages'] = $this->pagemodel->get_with_parent();
		$this->data['subview'] = 'admin/page/index.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function edit($id = NULL)
	{
		if($id)
		{
			$this->data['page'] = $this->pagemodel->get_page($id);
		}
		else
			$this->data['page'] = $this->pagemodel->get_new();

		$this->data['pages_no_parents'] = $this->pagemodel->get_no_parents();

		if(isset($_POST['submit']))
		{
			$parent_id = trim(xss_clean($_POST['parent_id']));
			$template = trim(xss_clean($_POST['template']));
			$title = trim(xss_clean($_POST['title']));
			$slug = trim(xss_clean($_POST['slug']));
			$body = $_POST['body'];
			//$body = trim(xss_clean($_POST['body']));

			if(min_length($title, 1) && max_length($title, 100) && $this->_unique_title($title, $id) && min_length($slug, 1) && max_length($slug, 100) && $this->_unique_slug($slug, $id) && alpha_numeric($slug))
			{
				if($id)
				{
					if($this->pagemodel->update_page($id, $parent_id, $template, $title, $slug, $body))
					{
						$_SESSION['err'] .= 'Edycja strony zakończona powodzeniem.';
						redirect('admin_page');
					}
					else
					{
						$_SESSION['err'] .= 'Edycja strony zakończona niepowodzeniem.';
						redirect('admin_page/edit/' . $id);
					}
				}
				elseif(!$id)
				{
					if($this->pagemodel->create_page($parent_id, $template, $title, $slug, $body))
					{
						$_SESSION['err'] .= 'Zapis strony zakończony powodzeniem.';
						redirect('admin_page');
					}
					else
					{
						$_SESSION['err'] .= 'Zapis strony zakończony niepowodzeniem.';
						redirect('admin_page/edit');
					}
				}
			}
			else
			{
				$_SESSION['err'] .= 'Zapis strony zakończony niepowodzeniem.';
				redirect('admin_page/edit');
			}
		}

		$this->data['subview'] = 'admin/page/edit.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function staticpage()
	{
		$this->data['pages_no_parents'] = $this->pagemodel->get_no_parents();

		if(isset($_POST['submit']))
		{
			$parent_id = trim(xss_clean($_POST['parent_id']));
			$title = trim(xss_clean($_POST['title']));
			$slug = trim(xss_clean($_POST['slug']));
			$headnfoot = $_POST['headnfoot'];
			$pageadress = $_POST['pageadress'];

			if(max_length($title, 100) && min_length($title, 2) && $this->_unique_title($title) && min_length($slug, 2) && max_length($slug, 100) && $this->_unique_slug($slug))
			{
				if($this->pagemodel->save_static_page($parent_id, $title, $slug, $headnfoot, $pageadress))
				{
					$_SESSION['err'] .= 'Zapis strony statycznej zakończony powodzeniem.';
					redirect('admin_page');
				}
				else
				{
					$_SESSION['err'] .= 'Zapis strony statycznej zakończony niepowodzeniem.';
					redirect('admin_page');
				}
			}
			else
			{
				$_SESSION['err'] .= 'Zapis strony statycznej zakończony niepowodzeniem.';
				redirect('admin_page');
			}
		}

		$this->data['subview'] = 'admin/page/staticpage.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function order ()
	{
		$this->data['sortable'] = TRUE;
		$this->data['subview'] = 'admin/page/order.php';

		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function order_ajax ()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			$this->pagemodel->save_order($_POST['sortable']);
		}
		
		// Fetch all pages
		$this->data['pages'] = $this->pagemodel->get_nested();
		
		// Load view
		$view = registry::register("view");
		$view->addExternalView('admin/page/order_ajax', $this->data);
	}

	public function delete($id)
	{
		$this->pagemodel->delete_page($id);
		redirect('admin_page');
	}

	private function _unique_title($title, $id = NULL)
	{
		if($id)
		{
			if(!$this->pagemodel->unique_title_id($title, $id))
			{
				return true;
			}
		}
		else
		{
			if(!$this->pagemodel->unique_title($title))
			{
				return true;
			}
		}
		$_SESSION['err'] .= $id . 'Tytuł jest juz uzywany. </br>';
		return false;
	}

	private function _unique_slug($slug, $id = NULL)
	{
		if($id)
		{
			if(!$this->pagemodel->unique_slug_id($slug, $id))
			{
				return true;
			}
		}
		else
		{
			if(!$this->pagemodel->unique_slug($slug))
			{
				return true;
			}
		}
		$_SESSION['err'] .= $id . 'Alias jest juz uzywany. </br>';
		return false;
	}
}