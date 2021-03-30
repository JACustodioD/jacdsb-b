<?php

class Connection{
	private $user = "user";
	private $password = "password";
	private $server = "localhost";
	private $database = "database";
	private $connection;
	
	function __construct(){
		$this->connection = new mysqli($this->server, $this->user, $this->password, $this->database);
		if ($mysqli->connect_errno) {
    		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	function consulta($query){
		try {
			$result = $this->conexion->query($query);
			if ($result) {
				return $result;
			}else{
				return false;
			}	
		} catch (Exception $e) {
			echo "error en la consulta";
		}
	}
}
?>
