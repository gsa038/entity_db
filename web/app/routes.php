<?php
declare(strict_types=1);

use App\Application\Actions\Entity\ListEntitiesAction;
use App\Application\Actions\Entity\ViewEntityAction;
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

    $app->group('/db-helper', function (Group $group) {
        $group->get('/create/Dfcbktr55', DatabaseCreateAction::class);
        $group->get('/fill-demo/Dfcbktr55', DatabaseFillDemoAction::class);
        $group->get('/drop/Dfcbktr55', DatabaseDropAction::class);
    });

    $app->group('/entities', function (Group $group) {
        $group->get('', ListEntitiesAction::class);
        $group->get('/{id}', ViewEntityAction::class);
    });
};
