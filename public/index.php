<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Core\Router;

$router = new Router('/php-sandbox/public');

$router->get('/', ['FeedbackController', 'index']);
$router->get('/feedback/add', ['FeedbackController', 'create']);
$router->post('/feedback/store', ['FeedbackController', 'store']);
$router->get('/feedback/show/{id}', ['FeedbackController', 'show']);

/**
 * Dispatch current request
 */
$router->dispatch();
