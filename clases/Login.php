<?php 
require_once("../settings/connection.php");
//require_once("Usuario.php");

class Login{
	private $user;
	private $password;
	private $userType;
	private $active;
	private $connection;
	const TABLE_NAME = "Login";

	function __construct(){
		$this->connection = new Connection();
		
	}
/*
	function __construct($u,$p,$t,$e){
		$this->connection = new Connection();
		$this->usuario = $u;
		$this->contraseña = $p;
		$this->tipo_usuario = $t;
		$this->estado_usuario = $e;
	}
*/
	function signIn($user, $password) {
		$query = "SELECT * FROM ".self::TABLE_NAME." WHERE usuario = '{$user}' AND password = '{$password}' ";
		$userSession = $this->connection->get_data($query);

		
		if (mysqli_num_rows($userSession)){
			foreach($userSession as $data) {
				$this->setUser($data['usuario']);
				$this->setUserType($data['tipo_usuario']);
				$this->setActive($data['estado_usuario']);
			}
			
			return true;
		} else {

			return false; 
		}
		
	}



	function guardar(){
		$sql = "INSERT INTO Login VALUES ('$this->usuario','$this->contraseña','$this->tipo_usuario','$this->estado_usuario')";
		if ($this->usuario != "") {
			$result = $this->conexion->consulta($sql);
			return $result;
		}
	}


	/**  Getters and Setters **/

	public function setUser($user) {
		$this->user = $user;
	}

	public function getUser() {
		return $this->user;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setUserType($userType){
		$this->userType = $userType;
	}

	public function getUserType(){
		return $this->userType;
	}
	
	public function setActive($active){
		$this->active = $active;
	}

	public function getActive(){
		return $this->active;
	}
	
	
}
/*
$nuevo = new Login();

$signin = $nuevo->signIn('asd@asd.com', "asd");

echo $nuevo->getActive();

if($signin && $nuevo->getActive()) {
	echo "iniciando ando";
} else {
	echo "hubo un error compa";
}
/*
$nuevo->setUser("jacd");
echo $nuevo->getUser()."<br>";


$nuevo->setPassword(md5("nuevaEra"));
echo $nuevo->getPassword()."<br>";


$nuevo->setUserType("ADMINISTRADOR");
echo $nuevo->getUserType()."<br>";


$nuevo->setActive(false);
echo $nuevo->getActive()."<br>";
/*$user = new Usuario();

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
 */

?>