<?php

use Slim\Factory\AppFactory;
use Slim\Middleware\ErrorMiddleware;

require __DIR__ . '/../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Error 404 personalizzato
$errorMiddleware->setErrorHandler(\Slim\Exception\HttpNotFoundException::class, function (
    Psr\Http\Message\ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write('<h1>Errore 404: Pagina non trovata</h1>');
    return $response->withStatus(404);
});

(require __DIR__ . '/../src/routes.php')($app);

$app->run();
