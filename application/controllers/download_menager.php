<?php

class download_menager extends front_module
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index($hash)
	{
		$file = $this->dashmodel->get_file($hash);
		$name = $file['file_title'] . '.' . $file['extension'];
		$path = realpath('') . '/assets/uploaded_files/' . $file['file_url'];
		header('Cache-control: private');
	    header('Content-Type: application/octet-stream');
	    header('Content-Length: '.filesize($path));
	    header('Content-Disposition: filename='.$name);
	    readfile($path);
	    exit;
	}
}