
<?php

require_once __DIR__ . '/controllers/MainControllers.php';

$router = new AltoRouter();

// Calcul automatique de la base path (en incluant /public)
$basePath = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
$router->setBasePath($basePath);

// Routes
$router->map('GET', '/', 'MainControllers#home', 'home');
$router->map('GET', '/catalogue', 'MainControllers#catalogue', 'catalogue');
$router->map('GET', '/detail_catalogue', 'MainControllers#detail_catalogue', 'detail_catalogue');
$router->map('GET', '/register', 'MainControllers#register', 'register');
$router->map('GET', '/login', 'MainControllers#login', 'login');
// Retourne l'objet router
return $router;
