<?php

class database
{
	public $result = array();
	public $error;
	private $connect;
	private $stmt;

	public function __construct($_host = false, $_user = false, $pass = false, $_name = false)
	{
		$config = registry::register("config");
		$host = $config->mysql_host;
		$port = $config->port;
		$username = $config->username;
		$password = $config->password;
		$database = $config->database;

		if(!isset($host))
		{
			$host = false;
			$port = false;
			$username = false;
			$password = false;
			$database = false;
		}

		if($host === false)
		{
			die("Nie przekazano danych dostępowych do bazy.");
		}

		try{
			$this->connect = new PDO('mysql:host='.$host.';dbname='.$database.';port='.$port, $username, $password);
			$this->connect->exec("set names utf8");
			$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $this->connect;
			
		}catch(PDOException $e)
		{
			$this->error = $e->getMessage();
		}
		
	}

	public function query($query)
	{
		$this->stmt = $this->connect->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
	    if (is_null($type)) {
	        switch (true) {
	            case is_int($value):
	                $type = PDO::PARAM_INT;
	                break;
	            case is_bool($value):
	                $type = PDO::PARAM_BOOL;
	                break;
	            case is_null($value):
	                $type = PDO::PARAM_NULL;
	                break;
	            default:
	                $type = PDO::PARAM_STR;
	        }
	    }
	    $this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
	    return $this->stmt->execute();
	}

	public function resultset(){
	    $this->execute();
	    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
	    $this->execute();
	    return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount(){
	    return $this->stmt->rowCount();
	}

	public function lastInsertId(){
	    return $this->dbh->lastInsertId();
	}

	public function beginTransaction(){
	    return $this->dbh->beginTransaction();
	}

	public function endTransaction(){
	    return $this->dbh->commit();
	}

	public function cancelTransaction(){
	    return $this->dbh->rollBack();
	}

	public function debugDumpParams(){
	    return $this->stmt->debugDumpParams();
	}
public function aaa()
{
	return 'abc';
}
}