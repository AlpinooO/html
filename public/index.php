<?php

include '/views/header.php';
include '/views/footer.php';
include '/vendor/model/database.php';

require_once __DIR__ . '/src/controllers/MainControllers.php';

$router = require_once __DIR__ . '/router/route.php';

require_once __DIR__ . '/vendor/autoload.php';
$match = $router->match();

if ($match) {
    [$controller, $method] = explode('#', $match['target']);

    if (class_exists($controller) && method_exists($controller, $method)) {
        (new $controller())->$method();
    } else {
        (new MainController())->notFound();
    }
} else {
    (new MainController())->notFound();
}
