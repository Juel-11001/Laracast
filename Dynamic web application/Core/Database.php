<?php
namespace Core;
use PDO;
//connection to the database and execute and query:
class Database
{
	public $connection;
	public  $statment;
	public function __construct($config, $username = 'valet', $password = '')
	{

		$dsn = ('mysql:' . http_build_query($config, '', ';'));

		// $dsn= "mysql:host={$config['host']};port={$config['port']};user={$config['user']};password=11001;dbname={$config['dbname']}";
		$this->connection = new PDO($dsn, $username, $password, [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);
	}

	public function query($query, $params=[])
	{

		// $pdo=new PDO($dsn);
		$this->statment = $this->connection->prepare($query);
		$this->statment->execute($params);
		// return $statment;
		return $this;
	}

	public function get()
	{
		return $this->statment->fetchAll();
	}

	public function find()
	{
		return $this->statment->fetch();
	}

	public function findOrFail()
	{
		$result=$this->find();
		if(!$result){
			abort();
		}
		return $result;
	}
}
