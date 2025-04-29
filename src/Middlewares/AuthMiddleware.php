<?php

namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Message\ResponseInterface as Response;

class AuthMiddleware
{
    public function __invoke(Request $request, Handler $handler): Response
    {
        $isLogged = isset($_SESSION['user']); // Simuliamo login

        if (!$isLogged) {
            $response = new \Slim\Psr7\Response();
            $response->getBody()->write('Accesso negato. Devi essere loggato.');
            return $response->withStatus(403);
        }

        return $handler->handle($request);
    }
}
