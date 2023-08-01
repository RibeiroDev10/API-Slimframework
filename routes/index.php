<?php

use src\slimConfiguration;
use App\Controllers\ProductController;

$app = new \Slim\App();
// ==================================================================

$app->get('/', ProductController::class . ':getProducts');

// ==================================================================
$app->run();