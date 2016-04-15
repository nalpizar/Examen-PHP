<?php

/**
 * index.php
 * Inicia la aplicación y sirve como enrutador para el back-end.
 */

require "bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

// Muestra todos los errores
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$contenedor = new \Slim\Container($configuration);

// Crea una nueva instancia de SLIM mostrando todos los errores
// http://www.slimframework.com/docs/handlers/error.html
$app = new \Slim\App($contenedor);

// Definimos nuestras rutas
$app->post(
    '/user/create',
    function ($request, $response) {

        $userController = new App\Controllers\UserController();

        // Save result on the variable
        $result = $userController->createGame($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);


// Game List
$app->get(
    '/user/list',
    function ($request, $response) {
        // Request for the controller
        $userController = new App\Controllers\UserController();

        // Save result on the variable
        $result = $userController->getDetails($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);


// Game by ID
$app->get(
    '/user/game',
    function ($request, $response) {
        // Request for the controller
        $userController = new App\Controllers\UserController();

        // Save result on the variable
        $result = $userController->getByID($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);


// Run app.
$app->run();
