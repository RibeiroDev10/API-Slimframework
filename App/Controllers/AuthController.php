<?php

namespace App\Controllers;

use App\DAO\MySQL\CodeeasyGerenciadorDeLojas\UsuariosDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class AuthController
{
    public function login(Request $request, Response $response, array $args) : Response
    {
        $data = $request->getParsedBody();

        $email = $data['email'];

        $usuarioDAO = new UsuariosDAO();
        $usuario = $usuarioDAO->getUserByEmail($email);
        echo '<pre>';
        print_r($usuario);
        echo '<pre>';

        $response->getBody()->write('teste');

        return $response;
    }
}