<?php

require_once __DIR__."/../vendor/autoload.php";

use App\Controller\FeedbackController;


$controller = new FeedbackController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store();
} else {
    $controller->index();
}

