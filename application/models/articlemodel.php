<?php

class articlemodel extends model_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_article($id)
	{
		$this->db->query("SELECT * FROM articles WHERE id = '$id'");
		$this->db->execute();
		return $this->db->single();
	}

	public function get_tags_data()
	{
		$this->db->query("SELECT tags FROM articles ORDER BY RAND() LIMIT 15");
		$tags = $this->db->resultset();
		$array = array();
		foreach($tags as $row)
		{
			$array[] = $row['tags'];
		}
		return $array;
	}

	public function random_art()
	{
		$this->db->query("SELECT * FROM articles ORDER BY RAND() LIMIT 4");
		return $this->db->resultset();
	}

	public function post_of_a_day($id)
	{
		return $this->get_article($id);
	}

	public function newest_art()
	{
		$date = date('Y-m-d H:i:s');
		$this->db->query("SELECT * FROM articles WHERE pubdate <= '$date' ORDER BY pubdate desc, id desc LIMIT 5");
		return $this->db->resultset();
	}

	public function popular_art()
	{
		$date = date('Y-m-d H:i:s');
		$this->db->query("SELECT * FROM articles WHERE pubdate <= '$date' ORDER BY views desc LIMIT 5");
		return $this->db->resultset();
	}

	public function get_similar_articles($title,$body)
	{
		$this->db->query("SELECT * FROM articles WHERE title LIKE '%$title%' OR body LIKE '%$body%' ORDER BY pubdate DESC LIMIT 3");
		return $this->db->resultset();
	}

	public function add_views($id)
	{
		$this->db->query("UPDATE articles SET views=views+1 WHERE id='$id'");
		if($this->db->execute())
		{
			return true;
		}
		else
			return false;
	}

	public function get_to_pagination($parent_page)
	{
		$this->db->query("SELECT count(id) as cnt FROM articles WHERE parent_page = '$parent_page' ");
		$this->db->execute();
		return $this->db->single();	
	}

	public function get_to_news($page_title, $perpage, $offset)
	{
		$this->db->query("SELECT * FROM articles WHERE parent_page = '$page_title' LIMIT $offset, $perpage");
		return $this->db->resultset();
	}

	public function count_articles()
	{
		$this->db->query("SELECT count(id) as cnt FROM articles");
		$this->db->execute();
		$res = $this->db->single();
		return $res['cnt'];
	}

	public function get_to_admin($perpage, $offset)
	{
		$this->db->query("SELECT * FROM articles ORDER BY id DESC LIMIT $offset, $perpage ");
		return $this->db->resultset();
	}

	public function get_new ()
	{
		$article = array();
		$article['id'] = 0;
		$article['created'] = date('Y-m-d H:i:s');
		$article['modified'] = '0000-00-00 00:00:00';
		$article['created_by'] = $_SESSION['login'];
		$article['modified_by'] = '';
		$article['category'] = '';
		$article['tags'] = '';
		$article['parent_page'] = array();
		$article['positive'] = 0;
		$article['negative'] = 0;
		$article['title'] = '';
		$article['body'] = '';
		$article['views'] = '';
		$article['logo'] = 'aa';
		$article['pubdate'] = date('Y-m-d H:i:s');
		return $article;
	}

	public function save($id = false, $title, $pubdate, $category, $tags, $parent_page, $body, $logo = false)
	{

		if($id)
		{
			$modified_by = $_SESSION['login'];
			$modified = date('Y-m-d H:i:s');
			$this->db->query("UPDATE articles SET title='$title', pubdate='$pubdate', category='$category', tags='$tags', body='$body', parent_page='$parent_page', logo='$logo', modified_by='$modified_by', modified='$modified' WHERE id='$id'");
			$this->db->execute();
			if($this->db->rowCount() == 1)
				return true;
			else
				return false;
		}
		else
		{
			$created_by = $_SESSION['login'];
			$this->db->query("INSERT INTO articles (title, pubdate, category, tags, parent_page, body, logo, created_by) VALUES ('$title', '$pubdate', '$category', '$tags', '$parent_page', '$body', '$logo', '$created_by')");
			$this->db->execute();
			if($this->db->rowCount() == 1)
				return true;
			else
				return false;
		}
	}

	public function get_logo($id)
	{
		$this->db->query("SELECT logo FROM articles WHERE id='$id'");
		$this->db->execute();
		$res = $this->db->single();
		if($res == 0)
		{
			return false;
		}
		else return $res;
	}

	public function delete_logo($id)
	{
		$this->db->query("UPDATE articles SET logo = 0 WHERE id = '$id'");
		$this->db->execute();
	}

	public function delete($id)
	{
		$this->db->query("DELETE FROM articles WHERE id = '$id'");
		$this->db->execute();
	}

}