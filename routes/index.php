<?php

use src\slimConfiguration;
use App\Controllers\ProdutoController;
use App\Controllers\LojaController;

$app = new \Slim\App();

// ==================================================================

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

// ==================================================================
$app->run();