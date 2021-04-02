<?php
require_once '../vendor/autoload.php';

$views_path = "{$_SERVER['DOCUMENT_ROOT']}/views";

$loader = new \Twig\Loader\FilesystemLoader($views_path);

$twig = new \Twig\Environment($loader, []);


$params = [
    'sesionUser'  => true,
    'date'  => Date('Y'),
];


echo $twig->render('car.twig', $params);