<?php

require_once '../vendor/autoload.php';
require_once '../settings/connection.php';
require_once '../clases/Product.php';
require_once '../clases/User.php';



session_start();

$connection = new Connection();
$product = new Product($connection);
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

$products = $product->getProductsPerCategory('Mochila');

$params = [
    'productsTitle' => 'Mochilas',
    'products' => $products,
    'sesionUser'  => $sessionUser,
    'userFullName' => $userFullName,
    'date'  => Date('Y'),
];


echo $twig->render('pages.twig', $params);
