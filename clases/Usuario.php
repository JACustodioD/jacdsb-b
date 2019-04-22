<?php
require_once("../settings/conexion.php");
session_start();
class Usuario{
	public $db;
	public $nombre;
	public $apellidoP;
	public $apellidoM;
	public $sexo;
	public $email;
	public $direccion;

	function __construct($n,$ap,$am,$s,$e,$d){
		$this->db = new Connection();
		$this->nombre = $n;
		$this->apellidoP = $ap;
		$this->apellidoM = $am;
		$this->sexo = $s;
		$this->email = $e;
		$this->direccion = $d;
	}

	function guardar(){
		$sql = "INSERT INTO Usuario VALUES('$this->email','$this->nombre','$this->apellidoP','$this->apellidoM','$this->sexo','$this->direccion')";
		if ($this->email != "") {
			$result = $this->db->consulta($sql);
			 return $result;
			
		}

	}

	/*function asignarAlu($adm_usr,$adm_pas){
		$this->adm_usr = $adm_usr;
		$this->adm_pas = $adm_pas;
	}*/

/*	function mostrar($adm_usr){
		$consulta = "SELECT * FROM adm WHERE adm_usr = '$adm_usr' ";
		$result = $this->db->consulta($consulta);
		foreach ($result as $k) {
			$this->adm_usr = $k['adm_usr'];
			$this->adm_pas = $k['adm_pas'];
		}
	}

	/*function registrarAlumno($adm_usr,$adm_pas){
		$this->adm_usr = $adm_usr;
		$this->adm_pas = $adm_pas;
		$this->agregarAlu();
	}*/
}

?>