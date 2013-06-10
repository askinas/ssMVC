<?php if (!defined('ROOT_DIR')) exit('No direct script access allowed');

class Main extends Controller {
	
	function index()
	{	
		$this->loadView('main_view');
	}	
	function test()
	{	
		/*
			you can do view with $data:
				$this->loadView('main_view',$data);
			or you can output the data as json:
				$this->loadView($data);
		*/
		$data = array('test'=>'view','default' => 'if no view, default output is json of data');
		$this->loadView($data);
	}
    
}

