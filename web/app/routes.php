<?php
declare(strict_types=1);

use App\Application\Actions\Entity\EntityCreateAction;
use App\Application\Actions\Entity\ViewEntityByIdAction;
use App\Application\Actions\Entity\ViewEntityByNameAction;
use App\Application\Actions\User\ListUsersAction;
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
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/entity', function (Group $group) {
        $group->post('', EntityCreateAction::class);
        $group->get('/id/{id}', ViewEntityByIdAction::class);
        $group->get('/name/{name}', ViewEntityByNameAction::class);
    });

};
