<?php

class admin_gallery extends admin_module
{
	public function __construct()
	{
		parent::__construct();
		$_SESSION['err'] = '';
	}

	public function index()
	{
		$this->data['images'] = $this->gallerymodel->get_images_url();

		$this->data['subview'] = 'admin/gallery.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function do_upload()
	{
		if($_POST['submit'])
		{
			$title = trim(xss_clean($_POST['img_title']));
			if(min_length($title, 3) && max_length($title, 100) && alpha_dash_space($title))
			{
				$upload_path = realpath('') . '/assets/gallery/';
				$tmp = explode('.', $_FILES['userfile']['name']);
				$tnm = md5(time());
				$upload_file = $upload_path . $tnm . '.' . end($tmp);
				if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/jpg' || $_FILES['userfile']['type'] == 'image/png') && $_FILES['userfile']['size'] <= 30000000)
				{
					if(move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file))
					{
						$img_url = 'assets/gallery/' . $tnm . '.' . end($tmp);
						if($this->gallerymodel->save($title, $img_url))
						{
							$_SESSION['err'] .= 'Obraz został zapisany.';
						}
						else
						{
							$_SESSION['err'] .= 'Obraz nie został zapisany.';
							
						}

					}
					else
						$_SESSION['err'] .= 'Logo nie zostało zapisane.';
				}
				else
					$_SESSION['err'] .= 'Niewłaściwy typ pliku [gif|png|jpeg|jpg] lub za duży rozmiar [3mb].';
			}
		}
		redirect('admin_gallery');
	}

	public function delete_image($id)
	{
		$img = $this->gallerymodel->get_to_delete($id);
		$this->gallerymodel->delete($id);
		unlink(realpath('') . '/' . $img);

		redirect('admin_gallery');
	}
}