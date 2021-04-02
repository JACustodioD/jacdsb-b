<?php
require_once './vendor/autoload.php';
require_once 'settings/connection.php';
require_once 'clases/Product.php';


$connection = new Connection();
$product = new Product($connection); 
$views_path = "{$_SERVER['DOCUMENT_ROOT']}/views";


$loader = new \Twig\Loader\FilesystemLoader($views_path);

$twig = new \Twig\Environment($loader, []);

$products = $product->getProducts();

$params = [
    'productsTitle' => 'Nuestros Productos',
    'products' => $products,
    'date'  => Date('Y')
];


echo $twig->render('pages.twig', $params);