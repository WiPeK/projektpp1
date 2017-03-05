<?php

class admin_configuration extends admin_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['tod_post'] = $this->dashmodel->get_art_todaypost();
		$this->data['subview'] = 'admin/configuration/index.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function cmsname()
	{
		if(isset($_POST['submit']))
		{
			$name = trim(xss_clean($_POST['name']));
			if(min_length($name, 3))
			{
				if($this->dashmodel->save_config('name', $name))
				{
					$_SESSION['err'] .= 'Nazwa CMS zapisana.';
				}
			}
		}
		redirect('admin_configuration');
	}

	public function upload_icon()
	{
		if(isset($_POST['upload']))
		{
			$upload_path = realpath('') . '/assets/images/';
			unlink(realpath('') . '/assets/images/favicon.ico');
			$upload_file = $upload_path . 'favicon.ico';

			if($_FILES['article_logo']['type'] == 'image/ico' || $_FILES['article_logo']['type'] == 'image/x-icon' || $_FILES['article_logo']['type'] == 'application/ico')
			{
				if(move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file))
				{
					$_SESSION['err'] .= 'Ikona zapisana.';
				}
			}

		}
		redirect('admin_configuration');
	}

	public function upload_logo()
	{
		if(isset($_POST['upload']))
		{
			$upload_path = realpath('') . '/assets/logo/';
			$tmp = explode('.', $_FILES['userfile']['name']);
			$tnm = md5(time());
			$upload_file = $upload_path . $tnm . '.' . end($tmp);
			$tb = 'assets/logo/' . $tnm . '.' . end($tmp);
			if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/jpg' || $_FILES['userfile']['type'] == 'image/png') && $_FILES['userfile']['size'] <= 30000000)
			{
				if(move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file))
				{
					if($this->dashmodel->save_config('logo_url', $tb))
					{
						$_SESSION['err'] .= 'Logo zapisane.';
					}
				}
			}
		}
		redirect('admin_configuration');
	}

	public function facebook_link()
	{
		if(isset($_POST['submit']))
		{
			$fb = trim(xss_clean($_POST['fb_link']));
			if(filter_var($fb, FILTER_VALIDATE_URL))
			{
				if($this->dashmodel->save_config('fb_link', $fb))
				{
					$_SESSION['err'] .= 'Link Facebook zapisany.';
				}
			}
		}
		redirect('admin_configuration');
	}

	public function about_service()
	{
		if(isset($_POST['submit']))
		{
			$about = trim(xss_clean($_POST['about_service']));
			if(min_length($about, 3))
			{
				if($this->dashmodel->save_config('about', $about))
				{
					$_SESSION['err'] .= 'Informacje o serwisie zapisane.';
				}
			}
		}
		redirect('admin_configuration');
	}

	public function description()
	{
		if(isset($_POST['submit']) && isset($_POST['description']))
		{
			$description = trim(xss_clean($_POST['description']));
			if($this->dashmodel->save_config('description', $description))
			{
				$_SESSION['err'] .= 'Opis portalu zapisany.';
			}
		}
		redirect('admin_configuration');
	}

	public function keywords()
	{
		if(isset($_POST['submit']) && isset($_POST['keywords']))
		{

			$keywords = trim(xss_clean($_POST['keywords']));
			if($this->dashmodel->save_config('keywords', $keywords))
			{
				$_SESSION['err'] .= 'Słowa kluczowe zapisane.';
			}
		}
		redirect('admin_configuration');
	}

	public function today_post()
	{
		if(isset($_POST['submit']) && isset($_POST['todaypost']))
		{

			$todaypost = trim(xss_clean($_POST['todaypost']));
			if($this->dashmodel->save_config('today_post', $todaypost))
			{
				$_SESSION['err'] .= 'Artykuł dnia zapisany.';
			}
		}
		redirect('admin_configuration');
	}

}