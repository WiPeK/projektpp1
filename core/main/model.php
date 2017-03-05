<?php

class model
{
	public function __get($model)
	{
		$config = register::register("configs");

		$_model = $model . 'model';
		$modelfile = $config->model_path . $_model . '.php';

		if(!file_exists($modelfile))
		{
			$modelfile = "core/models/nullmodel.php";
			$_model = 'nullmodel';
		}
		
		include_once($modelfile);
		
		$modelobj = register::register($_model);

		return $modelobj;
	}
}