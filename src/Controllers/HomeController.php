<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, array $args = []): Response
    {
        $response->getBody()->write('<h1>Benvenuto sulla Home Page!</h1>');
        return $response;
    }
}
