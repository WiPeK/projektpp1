<?php

class searchmodel extends model_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_tags_data($tag)
	{
		$this->db->query("SELECT * FROM articles WHERE tags LIKE '%$tag%' ORDER BY pubdate DESC");
		return $this->db->resultset();
	}

	public function get_category_data($category)
	{
		$this->db->query("SELECT * FROM articles WHERE category LIKE '%$category%' ORDER BY pubdate DESC");
		return $this->db->resultset();
	}

	public function get_date_data($data)
	{
		$this->db->query("SELECT * FROM articles WHERE pubdate = '$data'");
		return $this->db->resultset();
	}

	public function get_search_art($data)
	{
		$this->db->query("SELECT * FROM articles WHERE title LIKE '%$data%' or body LIKE '%$data%' or category LIKE '%$data%' or tags LIKE '%$data%' ORDER BY pubdate DESC");
		return $this->db->resultset();
	}

	public function get_search_pg($data)
	{
		$this->db->query("SELECT * FROM pages WHERE title LIKE '%$data%' or body LIKE '%$data%'");
		return $this->db->resultset();
	}
}