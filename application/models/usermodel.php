<?php

class usermodel extends model_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user($login, $password)
	{
		$this->db->query("SELECT * FROM users WHERE login='$login' AND password = '$password'");
		$this->db->execute();
		return $this->db->single();
	}

	public function login($login, $mods, $data)
	{
		$_SESSION['loggedin'] = true;
		$_SESSION['login'] = $login;
		$_SESSION['mods'] = $mods;
		$_SESSION['email'] = base64_encode($data['email']);
		$this->last_log_in($login);
		return true;
	}

	public function last_log_in($login)
	{
		$ost_log = date('Y-m-d H:i:s');
		$this->db->query("UPDATE users SET last_login = '$ost_log' WHERE login='$login'");
	}

	public function logout()
	{
		$_SESSION['loggedin'] = false;
		unset($_SESSION['login']);
		unset($_SESSION['email']);
		$_SESSION['mods'] = "";
	}

	public function count_users()
	{
		$this->db->query("SELECT count(id) as cnt FROM users");
		$this->db->execute();
		return $this->db->single();	
	}

	public function get_users($limit, $offset)
	{
		$this->db->query("SELECT * FROM users LIMIT $offset, $limit");
		return $this->db->resultset();
	}

	public function get_user_by_id($id)
	{
		$this->db->query("SELECT * FROM users WHERE id='$id'");
		$this->db->execute();
		return $this->db->single();
	}

	public function get_new(){
		$user = array();
		$user['id'] = '';
		$user['login'] = '';
		$user['password'] = '';
		$user['email'] = '';
		$user['create_date'] = '';
		$user['last_login'] = '';
		$user['mods'] = '';
		return $user;
	}

	public function update_user($id, $login, $password, $email, $mods)
	{
		$this->db->query("UPDATE users SET login='$login', password='$password', email='$email', mods='$mods' WHERE id='$id'");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function create_user($login, $password, $email, $mods)
	{
		$date = date("Y-m-d H:i:s");
		$this->db->query("INSERT INTO users (login, password, email, mods, create_date) VALUES ('$login', '$password', '$email', '$mods', '$date')");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function unique_login_id($login, $id)
	{
		$this->db->query("SELECT count(id) as cnt FROM users WHERE login='$login' AND id='$id'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_login($login)
	{
		$this->db->query("SELECT count(id) as cnt FROM users WHERE login='$login'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_email_id($email, $id)
	{
		$this->db->query("SELECT count(id) as cnt FROM users WHERE email='$email' AND id='$id'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_email($email)
	{
		$this->db->query("SELECT count(id) as cnt FROM users WHERE email='$email'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function delete_user($id)
	{
		$this->db->query("DELETE FROM users WHERE id='$id'");
		$this->db->execute();
	}
}