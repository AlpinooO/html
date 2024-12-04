
<?php

require_once __DIR__ . '/../controllers/MainController.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/catalogue', 'MainController#catalogue', 'catalogue');
$router->map('GET', '/detail_catalogue', 'MainController#detail_catalogue', 'detail_catalogue');
$router->map('GET', '/register', 'MainController#register', 'register');
$router->map('GET', '/login', 'MainController#login', 'login');
// Retourne l'objet router
return $router;
