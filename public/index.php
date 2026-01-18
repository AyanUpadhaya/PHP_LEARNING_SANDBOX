<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Core\Router;

$router = new Router('/php-sandbox/public');

/**
 * Register routes
 */
$router->get('/', 'FeedbackController@index');
$router->get('/feedback', 'FeedbackController@index');
$router->get('/feedback/add', 'FeedbackController@create');
$router->post('/feedback/store', 'FeedbackController@store');

/**
 * Dispatch current request
 */
$router->dispatch();
