<?php

class Model {

	public $db;

	public function __construct()
	{
		global $config;
		try {
			$this->db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['db_name'], $config['db_username'], $config['db_password']);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo 'Connection failed: Check Database Connection';
		}
	}

	public function insert($tabel,$data=array())
	{
		$keys = array_keys($data);
		$fields = '`'.implode('`, `',$keys).'`';
		$placeholder = ' :'.implode(', :',$keys).' ';
		
		try {
			$this->db->prepare("INSERT INTO $tabel ($fields) VALUES($placeholder)")->execute($data);
			return $this->db->lastInsertId();
		} catch (PDOException $e) {
			echo 'Query failed: '.$e->getMessage();
		}
	}

	public function select($string)
	{	
		try {
			$result = $this->db->query($string);
			return $result;
		} catch (PDOException $e) {
			echo 'Query failed: '.$e->getMessage();
		}
	}

}


