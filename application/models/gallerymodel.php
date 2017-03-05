<?php

class gallerymodel extends model_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_images_footer()
	{
		$this->db->query("SELECT id,img_url FROM gallery ORDER BY RAND() LIMIT 9");
		$imgs = $this->db->resultset();
		
		$array = array();
		if (count($imgs)) {
			foreach ($imgs as $row) {
				$array[$row['id']] = $row['img_url'];
			}
		}
		return $array;
	}

	public function get_images_url()
	{
		$this->db->query("SELECT * FROM gallery");

		$images_url = $this->db->resultset();
		$images = array();
		if(count($images_url))
		{
			foreach($images_url as $image_url)
			{
				$images[] = array(
					'id' => $image_url['id'],
					'img_title' => $image_url['img_title'],
					'img_who_add' => $image_url['img_who_add'],
					'add_date' => $image_url['add_date'],
					'img_url' => base_url() . $image_url['img_url'],
				);
			}
		}
		return $images; 
	}

	public function save($img_title, $img_url)
	{
		$img_who_add = $_SESSION['login'];
		$add_date = date('Y-m-d H:i:s');
		$this->db->query("INSERT INTO gallery (img_title, img_url, img_who_add, add_date) VALUES ('$img_title', '$img_url', '$img_who_add', '$add_date')");
			$this->db->execute();
			if($this->db->rowCount() == 1)
				return true;
			else
				return false;
	}

	public function get_to_delete($id)
	{
		$this->db->query("SELECT img_url FROM gallery WHERE id='$id'");
		$this->db->execute();
		$res = $this->db->single();
		return $res['img_url'];
	}

	public function delete($id)
	{
		$this->db->query("DELETE FROM gallery WHERE id = '$id'");
		$this->db->execute();
	}
}