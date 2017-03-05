<?php

class admin_user extends admin_module
{
	public function __construct()
	{
		parent::__construct();
		$this->main->load('pagination_helper');
		$this->main->load('validation_helper');
	}

	public function index()
	{
		$count = $this->usermodel->count_users();
		$perpage = 100;
		if((int)$count > $perpage)
		{
			$pages = ceil((int)$count/(int)$perpage);

        	$url = base_url() . 'admin_user/index/';

			$this->data['pagination'] = create_links($pages, $url, get_segment(3));
			
			if(empty(get_segment(3)))
				$offset = 0;
			else
				$offset = get_segment(3);
		}
		else
		{
			$this->data['pagination'] = '';
			$offset = 0;
		}

		$this->data['users'] = $this->usermodel->get_users($perpage, $offset);
		$this->data['subview'] = 'admin/user/index.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	public function edit($id = NULL)
	{
		if($id)
		{
			$this->data['user'] = $this->usermodel->get_user_by_id($id);
		}
		else
		{
			$this->data['user'] = $this->usermodel->get_new();
		}

		if(isset($_POST['submit']))
		{
			$_SESSION['err'] = "";
			$login = trim(xss_clean($_POST['login']));
			$email = trim(xss_clean($_POST['email']));
			if(isset($_POST['mods']))
				$mods = 'admin';
			else
				$mods = 'user';

			$pass = false;
			$password = trim(xss_clean($_POST['password']));
			$password_c = trim(xss_clean($_POST['password_c']));

			if(!$id)
			{
				if(min_length($password, 4) && max_length($password, 16) && is_the_same($password, $password_c))
				{
					$pass = true;
				}
			}
			elseif($id)
			{
				if(empty($_POST['password']) && empty($_POST['password_c']))
				{
					$password = $this->data['user']['password'];
					$pass = true;
				}
				else
				{
					if(min_length($password, 4) && max_length($password, 16) && is_the_same($password, $password_c))
					{
						$pass = true;
					}
				}
			}

			$password = md5($password);
			
			if($this->callback__unique_login($login, $id) && min_length($login, 3) && max_length($login, 16) && alpha_numeric($login) && $this->callback__unique_email($email) && valid_email($email) && $pass)
			{
				if($id)
				{
					if($this->usermodel->update_user($id, $login, $password, $email, $mods))
					{
						$_SESSION['err'] .= 'Edycja użytkownika zakończona powodzeniem.';
						redirect('admin_user');
					}
					else
					{
						$_SESSION['err'] .= 'Edycja użytkownika zakończona niepowodzeniem.';
						redirect('admin_user/edit/' . $id);
					}
				}
				elseif(!$id)
				{
					if($this->usermodel->create_user($login, $password, $email, $mods))
					{
						$_SESSION['err'] .= 'Zapis użytkownika zakończony powodzeniem.';
						redirect('admin_user');
					}
					else
					{
						$_SESSION['err'] .= 'Zapis użytkownika zakończony niepowodzeniem.';
						redirect('admin_user/edit');
					}
				}
			}
		}

		$this->data['subview'] = 'admin/user/edit.php';
		$view = registry::register("view");
		$view->addExternalView('admin/_layout_admin', $this->data);
	}

	private function callback__unique_login($login, $id = NULL)
	{
		if($id)
		{
			if(!$this->usermodel->unique_login_id($login, $id))
			{
				return true;
			}
		}
		else
		{
			if(!$this->usermodel->unique_login($login))
			{
				return true;
			}
		}
		$_SESSION['err'] .= $id . 'Login jest juz uzywany. </br>';
		return false;
	}

	private function callback__unique_email($email)
	{
		$id = get_segment(3);
		if($id)
		{
			if(!$this->usermodel->unique_email_id($email, $id))
			{
				return true;
			}
		}
		else
		{
			if(!$this->usermodel->unique_email($email))
			{
				return true;
			}
		}
		$_SESSION['err'] .= 'Email jest juz uzywany. </br>';
		return false;
	}

	public function delete ($id)
	{		
		$this->usermodel->delete_user($id);
		redirect('admin_user');
	}

}