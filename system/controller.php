<?php

class Controller {
	
	public function loadModel($name)
	{
		global $config;
		require_once($config['model_path']. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name='',$data='')
	{	
		global $config;
		if ($data!='' AND $name=='')
		
			echo json_encode($data);
			
		else if ($data=='' and is_array($name))
		
			echo json_encode($name);
		
		else {
			$path = $config['view_path'] . $name . '.php';
			if(file_exists($path)){
				require_once($path);
			}
			else {
				echo "View Error: $name.php not found";
			}			
		}
//		$view = new View($name);
//		return $view;
	}
	
	public function loadLibrary($name)
	{
		global $config;
		require_once($config['library_path']. strtolower($name) .'.php');
	}
	
	public function loadHelper($name)
	{
		global $config;
		require_once($config['helper_path']. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)
	{
		global $config;		
		header('Location: '. $config['base_url'] . $loc);
	}
    
}

?>