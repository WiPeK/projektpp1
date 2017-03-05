<?php

class main
{
	public function load($name)
	{
		$arr = explode("_", $name);
		$filename = $arr[0] . "_" . $arr[1] . '.php';
		$type = $arr[1];

		include_once($filename);

		if(!defined(strtoupper($arr[0])))
		{
			throw new Exception("Błąd wczytywania pliku " . $filename . " !");
		}
	}
}