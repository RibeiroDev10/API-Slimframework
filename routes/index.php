<?php

use function src\slimConfiguration;
use function src\basicAuth;

use App\Controllers\{

    ProdutoController,
    LojaController,
    AuthController
};

$app = new \Slim\App(slimConfiguration());

// ==================================================================

$app->post('/login', AuthController::class . ':login');

$app->group('', function () use ($app) {

    // LOJAS
    $app->get('/loja', LojaController::class . ':getLojas');
    $app->post('/loja', LojaController::class . ':insertLojas');
    $app->put('/loja', LojaController::class . ':updateLojas');
    $app->delete('/loja', LojaController::class . ':deleteLojas');

    // PRODUTOS
    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProdutos');
    $app->put('/produto', ProdutoController::class . ':updateProdutos');
    $app->delete('/produto', ProdutoController::class . ':deleteProdutos');
})->add(basicAuth());

// ==================================================================
$app->run();
