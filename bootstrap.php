<?php
declare(strict_types=1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Monolog\Logger;
use \Monolog\Handler\ErrorLogHandler;

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$container = new Slim\Container();
$container['settings']['displayErrorDetails'] = true;
$container['database'] = [
    'adapter' => 'mysql',
    'host' => getenv('DB_HOST'),
    'port' => getenv('DB_PORT'),
    'name' => getenv('DB_DATABASE'),
    'user' => getenv('DB_USERNAME'),
    'pass' => getenv('DB_PASSWORD'),
];

$app = new \Slim\App($container);

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $user = new Miles\Slim\User($name);
    $greeting = $user->sayHello();

    $response->getBody()->write($greeting);

    return $response;
});

$app->get('/log/{string}', function (Request $request, Response $response) {
    $string = $request->getAttribute('string');

    $log = new Logger('name');
    $log->pushHandler(new ErrorLogHandler());

    $log->warning('Foo', $this['environment']->all());
    $log->error('Bar');
    $log->info($string);

    $response->getBody()->write($string);

    return $response;
});

return $app;
