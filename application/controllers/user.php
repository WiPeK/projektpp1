<?php

class user extends front_module
{
	public function __construct()
	{
		parent::__construct();
		$this->main->load('validation_helper');
	}

	public function login()
	{
		if($_SESSION['loggedin'] == true && $_SESSION['mods'] == 'admin')
		{
			redirect('admin_dashboard');
		}
		if($_SESSION['loggedin'] == true && $_SESSION['mods'] == 'user')
		{
			redirect('');
		}

		if(isset($_POST['submit']))
		{
			$login = xss_clean(trim($_POST['login']));
			$password = xss_clean(trim($_POST['password']));
			if(min_length($login, 3) && min_length($password, 3) && max_length($login, 16) && max_length($password, 16) && alpha_numeric($login))
			{
				$this->data['user'] = $this->usermodel->get_user($login, md5($password)); var_dump($this->data['user']);
				if(!empty($this->data['user']))
				{
					if($this->usermodel->login($login, $this->data['user']['mods'], $this->data['user']))
					{
						if($this->data['user']['mods'] === 'admin')
						{
							redirect('admin_dashboard');
						}
						else
						{
							$_SESSION['err'] = 'Zalogowano pomyślnie.';
							redirect('');
						}
					}
				}
				else
				{
					$_SESSION['err'] = 'Nie udało się zalogować.';
					redirect('');
				}
			}
			else
			{
				$_SESSION['err'] = 'Nie udało się zalogować.';
				redirect('');
			}
		}
		else
			$_SESSION['err'] = 'Nie udało się zalogować.';
			redirect('');
	}

	public function logout ()
	{
		$this->usermodel->logout();
		redirect('');
	}
}