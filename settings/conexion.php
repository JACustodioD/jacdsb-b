<?php

class Connection{
	private $user = "server-provi";
	private $password = "<ProSyste3;2#";
	private $server = "localhost";
	private $database = "Tienda";
	private $conexion;
	
	function __construct(){
		$this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database);
		if ($mysqli->connect_errno) {
    		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	function consulta($consulta){
		try {
			$result = $this->conexion->query($consulta);
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