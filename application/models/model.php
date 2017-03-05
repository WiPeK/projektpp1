<?php

class model
{
	public function __get($model)
	{
		$config = registry::register('configs');

		$_model = $model . 'model';
		$modelfile = $config->model_path . $_model . '.php';

		if(!file_exists($modelfile))
		{
			$modelfile = "core/models/nullmodel.php";
			$_model = 'nullmodel';
		}
		
		include_once($modelfile);
		$modelobj = registry::register($_model);

		return $modelobj;
	}
}