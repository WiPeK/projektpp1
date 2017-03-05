<?php

class supportmodel extends model_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function save_application($em, $bd)
	{
		$date = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO support (email, body, send_date) VALUES ('$em', '$bd', '$date')");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function get_support($status)
	{
		$this->db->query("SELECT * FROM support WHERE status = '$status'");
		return $this->db->resultset();
	}

	public function show_answered($id)
	{
		$this->db->query("SELECT * FROM support WHERE id='$id'");
		$this->db->execute();
		return $this->db->single();
	}

	public function get_email_n_body($id)
	{
		$this->db->query("SELECT email, body FROM support WHERE id='$id'");
		$this->db->execute();
		return $this->db->single();
	}

	public function save_answer($id, $body)
	{
		$login = $_SESSION['login'];
		$date = date('Y-m-d H:i:s');
		$this->db->query("UPDATE support SET who_answer = '$login', status = 'made', answer_date = '$date', answer_body = '$body' WHERE id='$id'");
		if($this->db->execute())
		{
			return true;
		}
		else
			return false;
	}
}