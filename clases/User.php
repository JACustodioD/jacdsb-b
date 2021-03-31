<?php
require_once("../settings/connection.php");
session_start();

class User{
	private $name;
	private $lastName;
	private $lastNameM;
	private $gender;
	private $email;
	private $address;
	private $connection;
	const TABLE_NAME = "Usuario";

	function __construct(){
		$this->connection = new Connection();
	}

	function getUserData($email) {
		$query = "SELECT * FROM ". self::TABLE_NAME ." WHERE email = '{$email}' ";
		$userData = $this->connection->get_data($query);
		
		if(mysqli_num_rows($userData)) {
			foreach($userData as $user) {
				$this->setName($user['nombre']);
				$this->setLastName($user['apellidoP']);
				$this->setLastNameM($user['apellidoM']);
				$this->setGender($user['genero']);
				$this->setEmail($user['email']);
				$this->setAddress($user['direccion']);
			}
			return true;
		} else {
			return false;
		}
	}

	function save(){
		if(!$this->getEmail()){
			return false;
		}
		if(!$this->getName()){
			return false;
		}
		if(!$this->getLastName()){
			return false;
		}

		$query = "INSERT INTO ". self::TABLE_NAME ." VALUES ('{$this->getEmail()}', '{$this->getName()}', '{$this->getLastName()}', '{$this->getLastNameM()}', '{$this->getGender()}', '{$this->getAddress()}')";

		$result_query = $this->connection->get_data($query);

		return $result_query;
	}
/*
	function guardar(){
		$sql = "INSERT INTO Usuario VALUES('$this->email','$this->nombre','$this->apellidoP','$this->apellidoM','$this->sexo','$this->direccion')";
		if ($this->email != "") {
			$result = $this->db->consulta($sql);
			 return $result;
			
		}

	}*/



	/****  Getter and Setters ****/

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	
	
	public function getLastName() {
		return $this->lastName;
	}
	

	public function setLastNameM($lastNameM) {
		$this->lastNameM = $lastNameM;
	}
	

	public function getLastNameM() {
		return $this->lastNameM;
	}
	
	public function setGender($gender) {
		$this->gender = $gender;
	}


	public function getGender() {
		return $this->gender;
	}


	public function setEmail($email) {
		$this->email = $email;
	}


	public function getEmail() {
		return $this->email;
	}


	public function setAddress($address) {
		$this->address = $address;
	}


	public function getAddress() {
		return $this->address;
	}
	
}
/*
$yo = new User();
$yo->setName("Prueba");
$yo->setLastName("Prueba P");
$yo->setLastNameM("Prueba M");
$yo->setEmail("p@p.com");
$yo->setGender("Masculino");
$yo->setAddress("que te importa");

if($yo->save()){
	echo "ya la armamos";
}else {
	echo "no entraste brou";
}
*/
/*
if($yo->getUserData("jacustodiod@gmail.com")) {
	echo "Lo encontraste mano {$yo->getName()} {$yo->getLastName()}  {$yo->getLastNameM()}";
} else {
	echo "aqui no hay nada brou";
}
*/
?>