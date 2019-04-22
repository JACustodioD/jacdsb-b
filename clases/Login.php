<?php 
require_once("../settings/conexion.php");
require_once("Usuario.php");

class Login{
	public $usuario;
	public $contraseña;
	public $tipo_usuario;
	public $estado_usuario;
	public $conexion;

	function __construct($u,$p,$t,$e){
		$this->conexion = new Connection();
		$this->usuario = $u;
		$this->contraseña = $p;
		$this->tipo_usuario = $t;
		$this->estado_usuario = $e;
	}



	function guardar(){
		$sql = "INSERT INTO Login VALUES ('$this->usuario','$this->contraseña','$this->tipo_usuario','$this->estado_usuario')";
		if ($this->usuario != "") {
			$result = $this->conexion->consulta($sql);
			return $result;
		}
	}
	
}

/*$nuevo = new Login();
$user = new Usuario();

$nuevo->usuario = 'jacustodiod@gmail.com';
$nuevo->contraseña = 'dark';
$nuevo->tipo_usuario = "usuario";
$nuevo->estado_usuario= "1";

$user->nombre = 'Jose Alberto';
$user->apellidoP = 'Custodio';
$user->apellidoM = 'Diego';
$user->sexo = 'Masculino';
$user->direccion = 'no tengo idea';
$user->email = $nuevo->usuario;

$user->guardar();
$nuevo->guardar();
 
echo "holita";  */

?>