<?php

namespace Db;

require_once "dbconfig.php";

$db_config = array(
	'host' => 'localhost',
	'user' => 'mysql',
	'password' => '',
	'db_name' => 'restapibd',
);

class DataBase
{
	private  $host = '';
	private  $user = '';
	private  $password = '';
	private  $db_name = '';

	private  $conn = null;

	public function init()
	{

		$this->host =  'localhost';
	    $this->user = 'mysql';
		$this->password = '';
		$this->db_name = 'restapibd';

	}

	public function getConnection()
	{
		$this->init();

		$connection = $this->$conn;

		if($connection)
		{
			return $connection;
		}

		try{
			 $connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->user, $this->password);
		}catch(PDOException $exception){
			echo "Connection error. Can not connect with host:".$this->host." and user:".$this->user;

			return null;
		}

		$this->conn = $connection;

		return $connection;
	}
}

