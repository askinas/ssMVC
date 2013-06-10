<?php if (!defined('ROOT_DIR')) exit('No direct script access allowed');

class Acl_helper {

	function is_login()
	{
		if (isset($_SESSION['userdata']['user_id']) AND $_SESSION['userdata']['user_id']>0){
			return 1;
		} else return 0;
	}

}
