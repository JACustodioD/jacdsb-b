<?php
//ACCESO A LA PAGINA DE PROCESO
if (isset($_REQUEST['ac'])==1) {
	require_once 'conexion.php';
	require_once '../clases/Usuario.php';
	require_once '../clases/Login.php';
	$conexion = new Connection();

	//SI COD = 1 ES INICIO DE SESION
	if (isset($_REQUEST['cod'])==1) {
		if (isset($_REQUEST['sesion'])) {
			$user = $_POST['user'];
			$psw = $_POST['password'];
			if ($user != "" && $psw != "") {
				$sql = "SELECT * FROM Login WHERE usuario ='$user' AND password = '$psw' ";
				$result = $conexion->consulta($sql);
				$datos = mysqli_num_rows($result);
				session_start();
				if ($datos!= 0){
					foreach ($result as $k) {
						if ($k['estado_usuario']) {
							if ($k['tipo_usuario']=="administrador") {
								$_SESSION['admin'] = $user;
								header("Location: ../pages/admin.php ");
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
					echo "<script> alert ('Registrate antes de inciar sesion'); </script>";
					echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
				}
			}else{
				echo "<script> alert ('Debes completar todos los campos.'); </script>";
				echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
			}
		}
		//SI COD = 2 ES REGISTRO DE Usuario
	}if (isset($_REQUEST['cod']) ==2) {
		if (isset($_REQUEST['registro'])) {
			$user = $_POST['email'];
			$psw = $_POST['password'];
			if ($user != "" && $psw != "") {
				$usuario = new Usuario($_POST['nombre'],$_POST['apellidoP'],$_POST['apellidoM'],$_POST['sexo'],$user,$_POST['direccion']);
				$nuevo = new Login($user,$psw,"usuario","1");	
				if ($usuario->guardar()) {
					if($nuevo->guardar()){
						echo "<script> alert ('Usted se ha registrado, por favor inicie sesioin'); </script>";
						echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
					}else{
						echo "<script> alert ('No se pudo realizar el registro.'); </script>";
					}
				}else{
					echo "<script> alert ('El correo ya pertenece a una cuenta existente'); </script>";
					echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
				}
			}else{
				echo "<script> alert ('No se selecciono nada'); </script>";
				echo "<script> window.location.href= '../../jacdsb&b'; </script> ";
			}

		}
	}if (isset($_REQUEST['cod']) ==3) {
		if (isset($_POST['precio'])) {
			if (isset($_POST['id']) != "") {
			session_start();
			if (isset($_SESSION['user'])) {
				$id = $_POST['id'];
				$user = $_SESSION['user'];
				$total = 1 * $_POST['precio'];
				$sql = "INSERT INTO Carrito (usuario,producto,cantidad,total) VALUES ('$user','$id','1','$total'); ";
				$conexion->consulta($sql);
				echo "3";
			}else{
				echo "2";
				
			}
		}else{
			echo "1";

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
				echo "<script> alert ('Seleccione un producto para eliminar'); </script>";
				echo "<script> window.location.href= '../pages/carrito.php'; </script> ";

			}	
		}
		

	}

// si ac no es 1	
}else{
	header("Location: ../../Examen2");
}


?>