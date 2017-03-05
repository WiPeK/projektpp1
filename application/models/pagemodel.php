<?php

class pagemodel extends model_module
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_where_slug($slug)
	{
		$this->db->query("SELECT * FROM pages WHERE slug = '$slug'");
		$this->db->execute();
		return $this->db->single();
	}

	public function add_views($id)
	{
		$this->db->query("UPDATE pages SET views=views+1 WHERE id='$id'");

		if($this->db->execute())
		{
			return true;
		}
		else
			return false;
	}

	public function get_menu()
	{
		$this->db->query("SELECT * FROM pages ORDER BY 'order'");
		$pages = $this->db->resultset();

		$arr = array();
		foreach($pages as $page)
		{
			if(!$page['parent_id'])
			{
				$arr[$page['id']] = $page;
			}
			else
			{
				$arr[$page['parent_id']]['children'][] = $page;
			}
		}
		return $arr;
	}

	public function get_pages_to_home()
	{
		$this->db->query("SELECT title FROM pages WHERE template = 'news_archive'");
		$results = $this->db->resultset();
		$arr = array();
		$i = 0;
		foreach($results as $res)
		{
			$tmp = str_replace(' ','_',$res['title']);
			$this->db->query("SELECT * FROM articles WHERE parent_page = '$tmp' ORDER BY pubdate desc LIMIT 4");
			$arr[$i]['title'] = $res['title']; 
			$arr[$i]['m_art'] = $this->db->resultset();
			$i++;
		}

		return $arr;
	}

	public function get_with_parent()
	{
		$this->db->query("SELECT * FROM pages");
		$results = $this->db->resultset();
		$arr = array();
		$i = 0;

		foreach($results as $res)
		{
			$arr[$i] = $res;
			if($res['parent_id'] != 0)
			{
				$tmp = $res['parent_id'];
				$this->db->query("SELECT title FROM pages WHERE id = '$tmp'");
				$this->db->execute();
				$arr[$i]['parent_slug'] = $this->db->single();
			}
			else
				$arr[$i]['parent_slug'] = ''; 
			$i++;
		}
		return $arr;
	}

	public function get_page($id)
	{
		$this->db->query("SELECT * FROM pages WHERE id='$id'");
		$this->db->execute();
		return $this->db->single();
	}

	public function get_new()
	{
		$page = array();
		$page['title'] = '';
		$page['slug'] = '';
		$page['body'] = '';
		$page['parent_id'] = 0;
		$page['template'] = 'page';
		return $page;
	}

	public function get_no_parents()
	{
		$this->db->query("SELECT id, title FROM pages WHERE parent_id=0");
		$results = $this->db->resultset();
		$arr = array(
			0 => 'Brak strony nadrzędnej'
		);

		foreach($results as $res)
		{
			$arr[$res['id']] = $res['title'];
		}

		return $arr;
	}

	public function unique_title_id($title, $id)
	{
		$this->db->query("SELECT count(id) as cnt FROM pages WHERE title='$title' AND id='$id'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_title($title)
	{
		$this->db->query("SELECT count(id) as cnt FROM pages WHERE title='$title'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_slug_id($slug, $id)
	{
		$this->db->query("SELECT count(id) as cnt FROM pages WHERE slug='$slug' AND id='$id'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function unique_slug($slug)
	{
		$this->db->query("SELECT count(id) as cnt FROM pages WHERE slug='$slug'");
		$this->db->execute();
		if($this->db->single() == 0)
			return true;
		else
			return false;	
	}

	public function update_page($id, $parent_id, $template, $title, $slug, $body)
	{
		$this->db->query("UPDATE pages SET parent_id='$parent_id', template='$template', title='$title', slug='$slug', body='$body' WHERE id='$id'");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function create_page($parent_id, $template, $title, $slug, $body)
	{
		$this->db->query("INSERT INTO pages (parent_id, template, title, slug, body) VALUES ('$parent_id', '$template', '$title', '$slug', '$body')");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function delete_page($id)
	{
		$this->db->query("DELETE FROM pages WHERE id='$id'");
		$this->db->execute();
		$this->db->query("UPDATE pages SET parent_id = 0 WHERE parent_id = '$id'");
		$this->db->execute();
	}

	public function save_static_page($parent_id, $title, $slug, $headnfoot, $pageadress)
	{
		$this->db->query("INSERT INTO pages (parent_id, title, slug, pageadress, template, inc_def) VALUES ('$parent_id', '$title', '$slug', '$pageadress', 'static', '(int)$headnfoot')");
		$this->db->execute();
		if($this->db->rowCount() == 1)
			return true;
		else
			return false;
	}

	public function get_nested()
	{
		$this->db->query("SELECT * FROM pages ORDER by `order`");
		$pages = $this->db->resultset();

		$array = array();
		foreach($pages as $page)
		{
			if($page['parent_id'] == 0)
			{
				$array[$page['id']] = $page;
			}
			else
			{
				$array[$page['parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

	public function save_order($pages)
	{
		if(count($pages))
		{
			foreach($pages as $order => $page)
			{
				if($page['item_id'] != '')
				{
					$parent_id = (int)$page['parent_id'];
					$id = $page['item_id'];
					//var_dump($page);
					$this->db->query("UPDATE pages SET parent_id=$parent_id, `order`=$order WHERE id='$id'");
					$this->db->execute();
				}
			}
		}
	}

	public function get_article_parents ()
	{
		$this->db->query("SELECT title FROM pages WHERE template = 'news_archive'");
		$pages = $this->db->resultset();
		
		$array = array(
			//0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[str_replace(' ', '_', $page['title'])] = $page['title'];
			}
		}
		
		return $array;
	}

}