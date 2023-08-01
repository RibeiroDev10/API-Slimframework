<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require_once "vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true, // exibe os detalhes do erro do Slimframework
    ],
];
$configuration = new \Slim\Container($configuration);

$mid01 = function(Request $request, Response $response, $next):Response{

    $response->getBody()->write("Dentro do middleware 01<br>");

    $response = $next($request, $response);

    $response->getBody()->write("<br>Dentro do middleware 02<br>");

    return $response;
};

$app = new \Slim\App($configuration);

$app->get('/produtos[/{nome}]', function (Request $request, Response $response, array $args) {

    $limit = $request->getQueryParams()['limit'] ?? 10; // "??" = Se for nulo, traz o limite de 10.
    $nome = $args['nome'] ?? 'monitor'; // Aqui estamos obrigando a URL a ter um nome.

    return $response->getBody()->write("{$limit} produtos do banco de datos! Um deles é um {$nome}.");
});

$app->post('/produto', function (Request $request, Response $response, array $args) {

    // get parsed body = obter corpo analisado
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write("Produto " . $nome . "  (POST)");
})->add($mid01);

$app->put('/produto', function (Request $request, Response $response) {

    // get parsed body = obter corpo analisado
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write("Produto " . $nome . "  (PUT)");
});

$app->delete('/produto', function (Request $request, Response $response) {

    // get parsed body = obter corpo analisado
    $data = $request->getParsedBody();

    $nome = $data['nome'] ?? '';

    return $response->getBody()->write("Produto " . $nome . "  (DELETE)");
});

$app->run();
