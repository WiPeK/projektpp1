<?php

class admin_manage_files extends admin_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['files'] = $this->dashmodel->get_files();
		$this->data['subview'] = 'admin/manage_files.php';

		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function do_upload()
	{
		if(isset($_POST['upload']) && isset($_POST['file_title']) && isset($_FILES))
		{
			$title = trim(xss_clean($_POST['file_title']));
			if(min_length($title, 3) && max_length($title, 100) && alpha_dash_space($title))
			{
				$upload_path = realpath('') . '/assets/uploaded_files/';
				$tmp = explode('.', $_FILES['userfile']['name']);
				$tnm = md5(time());
				$upload_file = $upload_path . $tnm . '.' . end($tmp);


				if(($_FILES['userfile']['size'] <= 100000000) && valid_file(end($tmp)))
				{
					if(move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file) && $this->dashmodel->save_file($title, $tnm . '.' . end($tmp), end($tmp), $_FILES['userfile']['size']))
					{
						$_SESSION['err'] .= 'Zapis pliku zakończony powodzeniem.';
					}
					else
						$_SESSION['err'] .= 'Zapis pliku zakończony niepowodzeniem.';
				}
			}
		}
		redirect('admin_manage_files');
	}

	public function delete($hash)
	{
		$file = $this->dashmodel->get_file($hash);
		$this->dashmodel->delete($file['id']);
		unlink(realpath('') . '/assets/uploaded_files/' . $file['file_url']);
		$_SESSION['err'] .= 'Plik został usunięty.';
		redirect('admin_manage_files');
	}
}