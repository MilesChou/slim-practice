<?php
declare(strict_types=1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/vendor/autoload.php';

$container = new Slim\Container();
$container['settings']['displayErrorDetails'] = true;

$app = new \Slim\App($container);

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $user = new Miles\Slim\User($name);
    $greeting = $user->sayHello();

    $response->getBody()->write($greeting);

    return $response;
});

return $app;
