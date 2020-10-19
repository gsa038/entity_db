<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello entities!');
        return $response;
    });

    $app->get('/php-helper/Dfcbktr55', function (Request $request, Response $response) {
        $response->getBody()->write(phpinfo());
        return $response;
    });

    $app->get('/db-helper/create/Dfcbktr55', '\App\Controller\DBController:dbInit');
    // $app->get('/db-helper/fill-demo/Dfcbktr55', '\App\Controller\DBController:dbFill');
    $app->get('/db-helper/drop/Dfcbktr55', '\App\Controller\DBController:dbDrop');

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
