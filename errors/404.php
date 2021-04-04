<?php

require_once '../settings/connection.php';
require_once '../clases/User.php';
require_once '../vendor/autoload.php';


session_start();

$sessionUser = false;
$userFullName = "";

if (isset($_SESSION['user']) ) {
    $user = $_SESSION['user'];
    $userData = new User(); 
    
    if($userData->getUserData($user)) {
        $sessionUser = true;
        $userFullName = "{$userData->getName()} {$userData->getLastName()}";
    }
}


$views_path = "{$_SERVER['DOCUMENT_ROOT']}/views";

$loader = new \Twig\Loader\FilesystemLoader($views_path);

$twig = new \Twig\Environment($loader, []);


$params = [
    'sesionUser'  => $sessionUser,
    'userFullName' => $userFullName,
];


echo $twig->render('/errors/404.twig', $params);


