<?php
namespace App\Entity;

require_once "Db/DataBase.php";

use Db\DataBase;

interface BaseEntityInterface
{
	public function findAll($fields = null);
	public function findById(int $id, $fields = null);
}

abstract class BaseEntity implements BaseEntityInterface
{	
	private $table;
	private $db;

	public function __construct($table)
	{
		$this->table = $table;

		$dataBase = new DataBase();

		$this->db = $dataBase->getConnection();
	}

	public function findAll($fields = null)
	{	
		if(!$this->isConnected())
		{
			echo "Connection false";
			return null;
		}

		$sql = "SELECT * FROM ".$this->table;

		$result = $this->db->query($sql)->fetchAll();

		return $result;
	}

	public function findById(int $id, $fields = null)
	{
		if(!$this->isConnected())
		{
			echo "Connection false";
			return null;
		}

		$sql = "SELECT * FROM $this->table WHERE id = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	private function isConnected()
	{
		return $this->db  == null ? false : true;
	}
}