<?php

class Connection{
	private $user = "user";
	private $password = "password";
	private $server = "localhost";
	private $database = "database";
	private $connection;
	
	function __construct(){

		if ($this->connection == null) {
			try {
				$this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
			} catch (Exception $e) {
				echo "Connection error".$e->getMessage();	
			}
		}else{
			echo "there is a connection active";
		}
	}

	function get_data($query){
		try {
			$result = $this->connection->query($query);
			if ($result) {
				return $result;
			}else{
				echo "<script> alert('query faild); </script>";
			}	
		} catch (Exception $e) {
			echo "Error Query";
		}

	}
}
?>
