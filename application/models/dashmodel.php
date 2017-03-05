<?php

class dashmodel extends model_module
{

	public function __construct()
	{
		parent::__construct();
	}

	public function count_stats()
	{
		$this->db->query("SELECT count(id) as users FROM users");
		$this->db->execute();
		$data['users'] = $this->db->single();
		$this->db->query("SELECT count(id) as articles FROM articles");
		$this->db->execute();
		$data['articles'] = $this->db->single();
		$this->db->query("SELECT count(id) as pages FROM pages");
		$this->db->execute();
		$data['pages'] = $this->db->single();
		$this->db->query("SELECT count(id) as support FROM support");
		$this->db->execute();
		$data['support'] = $this->db->single();
		return $data;
	}

	public function get_cmsconfig()
	{
		$this->db->query("SELECT * FROM cmsconfig");
		$this->db->execute();
		return $this->db->single();
	}

	public function save_config($field, $value)
	{
		$this->db->query("UPDATE cmsconfig SET $field = '$value'");
		if($this->db->execute())
		{
			return true;
		}
		else
			return false;
	}

	public function get_art_todaypost()
	{
		$this->db->query("SELECT id,title FROM articles");
		$results = $this->db->resultset();

		$array = array(
			0 => 'Brak'
		);
		if (count($results)) {
			foreach ($results as $res) {
				$array[$res['id']] = $res['title'];
			}
		}
		return $array;
	}

	public function get_files()
	{
		$this->db->query("SELECT * FROM files ORDER BY add_date");
		return $this->db->resultset();
	}

	public function save_file($title, $name, $ext, $size)
	{
		$author = $_SESSION['login'];
		$add_date = date('Y-m-d H:i:s');
		$file_who_add = $_SESSION['login'];
		$hash = md5(time());
		$this->db->query("INSERT INTO files (file_title, file_who_add, add_date, file_url, extension, file_size, hash) VALUES ('$title', '$file_who_add', '$add_date', '$name', '$ext', '$size', '$hash')");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function get_file($hash)
	{
		$this->db->query("SELECT * FROM files WHERE hash='$hash'");
		$this->db->execute();
		return $this->db->single();
	}

	public function delete($id)
	{
		$this->db->query("DELETE FROM files WHERE id = '$id'");
		$this->db->execute();
	}

}