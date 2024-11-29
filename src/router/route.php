<?php
use AutoRouter\RouteCollection;
use AutoRouter\Route;

$router = new RouteCollection();
require_once __DIR__ .  '/../src/controllers/MainControllers.php';;

$router = new AltoRouter();

$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);


$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/catalogue', 'MainController#catalogue', 'catalogue');
$router->map('GET', '/detail_catalogue', 'MainController#detail_catalogue', 'detail_catalogue');
$router->map('GET', '/register', 'MainController#register', 'register');
$router->map('GET', '/login', 'MainController#login', 'login');
return $router;
AutoRouter::register($router);