<?php
$response = ["login" => false, "problem" => "desconocido"];

if(isset($_POST['type'])) {
	require_once '../clases/User.php';
	require_once '../clases/Login.php';

    switch($_POST['type']) {
        case 'register':
            $response = register();
            break;
        case 'login':
            $response = login();
            break;
        case 'logout':
            $response = logout();
            break;
        default:
            $response = ["login" => false, "problem" => "Hubó un error recargue el sitio e intente de nuevo 1"];
            break;
    }
} else {
    $response = ["login" => false, "problem" => "Hubó un error recargue el sitio e intente de nuevo"];
}

$response_json = json_encode($response);
echo $response_json;


function register(){
    $response_register = [];
    $user = $_POST['password'];
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
                $response_register = ["login" => true];
            }else{
                $response_register = ["login" => false, "problem" => "Hubó un error al realizar el registro contacte al administrador"];
            }
        }else {
            $response_register = ["login" => false, "problem" => "El usuario ya existe intente con otro email o si es su cuenta inicie sesion"];
        }
	} else {
        $response_register = ["login" => false, "problem" => "No completó los datos de acceso"];
    }

    return $response_register;
}
function login(){
    $response_login = ["login" => false, "problem" => "Petición incorrecta"];
    $user = $_POST['email'];
    $psw = $_POST['password'];
	if ($user != "" && $psw != "") {
		$userSession = new Login();
		session_start();
		if ($userSession->signIn($user, $psw)){
			if ($userSession->getActive()) {
                if ($userSession->getUserType() == "administrador") {
                    $_SESSION['admin'] = $userSession->getUser();
                        $response_login = ["login" => true];
                }else{
                    $_SESSION['user'] = $userSession->getUser();
                    $response_login = ["login" => true];
                }
			}else{
                $response_login = ["login" => false, "problem" => "Debes verificar tu cuenta con el email que se te envió antes de iniciar sesión"];
			}
        }else{
            $response_login = ["login" => false, "problem" => "No se encontro usuario. Registrate antes de iniciar sesión"];
        }
	} else {
        $response_login = ["login" => false, "problem" => "Llene todos los campos por favor"];
    }
    return $response_login;
}

function logout(){
    session_start();
    session_destroy();
    
    return  ["login" => true];
}