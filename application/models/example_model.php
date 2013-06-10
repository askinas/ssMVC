<?php

class Example_model extends Model {
	
	public function getSomething($id)
	{
		$result = $this->select('SELECT * FROM user WHERE user_id="'. $id .'"');
		return $result;
	}

}
