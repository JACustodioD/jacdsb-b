<?php
//ACCESO A LA PAGINA DE PROCESO
if (isset($_REQUEST['ac'])==1) {
	require_once 'conexion.php';
	require_once '../clases/Usuario.php';
	require_once '../clases/Login.php';
	$conexion = new Connection();

	//echo "conexion echa";
	//SI COD = 1 ES INICIO DE SESION
	if (isset($_REQUEST['cod'])==1) {
		if (isset($_REQUEST['sesion'])) {
			$user = $_POST['user'];
			$psw = $_POST['password'];
			//echo "recibi valores";
			if ($user != "" && $psw != "") {
				$sql = "SELECT * FROM Login WHERE usuario ='$user' AND password = '$psw' ";
				$result = $conexion->consulta($sql);
				$datos = mysqli_num_rows($result);
				//echo $datos;
				//echo "hice consulta";
				session_start();
				if ($datos!= 0){
					foreach ($result as $k) {
						if ($k['estado_usuario']) {
							//echo "usuario checado";
							if ($k['tipo_usuario']=="administrador") {
								echo "eres admini";
							}else{
								$_SESSION['user'] = $user;
								header("Location: ../pages/");
							}
						}else{
							echo "<script> alert ('Tu cuenta aun no es verificada. No tienes acceso'); </script>";
							echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
						}
					}
				}else{
					echo "No esta registrado";
				}
			}else{
				echo "estan vacias error";
			}
		}
		//SI COD = 2 ES REGISTRO DE Usuario
	}if (isset($_REQUEST['cod']) ==2) {
		if (isset($_REQUEST['registro'])) {
			$user = $_POST['email'];
			$psw = $_POST['password'];
			//echo "si es cod";
			if ($user != "" && $psw != "") {
				$usuario = new Usuario($_POST['nombre'],$_POST['apellidoP'],$_POST['apellidoM'],$_POST['sexo'],$user,$_POST['direccion']);
				$nuevo = new Login($user,$psw,"usuario","1");
				 //echo "no estan vacios";	
				if ($usuario->guardar()) {
					//echo "ya se guardo usuario";
					if($nuevo->guardar()){
						echo "<script> alert ('Usted se ha registrado, por favor inicie sesioin'); </script>";
						echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
					}else{
						echo "no se registro nada";
					}
				}else{
					echo "<script> alert ('El correo ya pertenece a una cuenta existente'); </script>";
					echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
				}
			}else{
				echo "estan vacias";
			}

		}
	}if (isset($_REQUEST['cod']) ==3) {
		if (isset($_REQUEST['p'])) {
			if (isset($_REQUEST['id']) != "") {
			session_start();
			if (isset($_SESSION['user'])) {
				$id = $_REQUEST['id'];
				$user = $_SESSION['user'];
				$total = 1 * $_REQUEST['p'];
				$sql = "INSERT INTO Carrito (usuario,producto,cantidad,total) VALUES ('$user','$id','1','$total'); ";
				$conexion->consulta($sql);
				echo "<script> window.location.href='../pages/'; </script>";
			}else{
				echo "<script> alert('Por favor. Inicie session primero'); </script>";
				echo "<script> window.location.href='../../jacdsb&b'; </script>";
			}
		}else{
			echo "no selecciono un producto 3 <br>";
			//header("Location: ../../Examen2");
		}
		}
		
	}if (isset($_REQUEST['cod']) == 4){
		if (isset($_REQUEST['prod'])) {
			if (isset($_REQUEST['prod']) != "") {
				session_start();
				if (isset($_SESSION['user'])) {
					$id = $_REQUEST['prod'];
					$user = $_SESSION['user'];
					$sql = "DELETE FROM Carrito WHERE producto = '$id' AND usuario = '$user' ";
					$conexion->consulta($sql);
					echo "<script> window.location.href='../pages/carrito.php'; </script>";
				}else{
					echo "<script> alert('Por favor. Inicie session primero'); </script>";
					echo "<script> window.location.href='../../jacdsb&b'; </script>";
				}
			}else{
				echo "no selecciono un producto para eliminar 4 <br>";
				//header("Location: ../../Examen2");
			}	
		}
		

	}

// si ac no es 1	
}else{
	header("Location: ../../Examen2");
}


?>