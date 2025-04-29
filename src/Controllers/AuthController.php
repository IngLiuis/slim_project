<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController
{
    public function login(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write('<h1>Pagina di Login</h1>');
        return $response;
    }

    public function dashboard(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write('<h1>Dashboard protetta: Utente Loggato</h1>');
        return $response;
    }
}
