<?php 
require_once '../settings/conexion.php';
class Producto{
	public $id_producto;
	public $desc;
	public $precio;
	public $tipo;
	public $imagen;
	public $conexion;

	function __construct(){
		$this->conexion = new Connection();
	}


	
}

?>