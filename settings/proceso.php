<?php

//ACCESO A LA PAGINA DE PROCESO
if (isset($_REQUEST['ac'])==1) {
	require_once 'connection.php';
	require_once '../clases/User.php';
	require_once '../clases/Login.php';
	$conexion = new Connection();

	//SI COD = 1 ES INICIO DE SESION
	if (isset($_REQUEST['cod'])==1) {
		singin();
		//SI COD = 2 ES REGISTRO DE Usuario
	}if (isset($_REQUEST['cod']) ==2) {
		registerUser();
	}
// si ac no es 1	
}else{
	header("Location: ../../jacdsb-b");
}


function singin(){
	if (isset($_REQUEST['sesion'])) {
		$user = $_POST['user'];
		$psw = $_POST['password'];
		if ($user != "" && $psw != "") {
			$userSession = new Login();
			session_start();
			if ($userSession->signIn($user, $psw)){
				if ($userSession->getActive()) {
					if ($userSession->getUserType() == "administrador") {
						$_SESSION['admin'] = $userSession->getUser();
					}else{
						$_SESSION['user'] = $userSession->getUser();
						header("Location: /");
					}
				}else{
					echo "<script> alert ('Tu cuenta aun no es verificada. No tienes acceso'); </script>";
					echo "<script> window.location.href= '/'; </script> ";
				}


			}else{
				echo "<script> alert ('Registrate antes de inciar sesion'); </script>";
				echo "<script> window.location.href= '/'; </script> ";
			}
		}else{
			echo "<script> alert ('Debes completar todos los campos.'); </script>";
			echo "<script> window.location.href= '/'; </script> ";
		}
	}
}

function registerUser() {
	if (isset($_REQUEST['register'])) {
		$user = $_POST['email'];
		$psw = $_POST['password'];
		if ($user != "" && $psw != "") {

			$new_user = new User();
			$new_user->setName($_POST['name']);
			$new_user->setLastName($_POST['lastName']);
			$new_user->setLastNameM($_POST['lastNameM']);
			$new_user->setEmail($_POST['email']);
			$new_user->setGender($_POST['gender']);
			$new_user->setAddress($_POST['address']);

			if($new_user->save()){
				$user_signin = new Login();
				$user_signin->setUser($new_user->getEmail());
				$user_signin->setPassword($_POST['password']);
				$user_signin->setUserType("usuario");
				$user_signin->setActive(true);
				if($user_signin->createUser()){
					echo "<script> alert ('Usted se ha registrado, por favor inicie sesioin'); </script>";
					echo "<script> window.location.href= '/'; </script> ";
				}else{
					echo "<script> alert ('No se pudo realizar el registro.'); </script>";
				}
			}else {
				echo "<script> alert ('El correo ya pertenece a una cuenta existente'); </script>";
				echo "<script> window.location.href= '/'; </script> ";
			
			}

		}else{
			echo "<script> alert ('No se selecciono nada'); </script>";
			echo "<script> window.location.href= '/'; </script> ";
		}
	}
}

?>