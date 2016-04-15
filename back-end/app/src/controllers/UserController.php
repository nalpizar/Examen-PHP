<?php

/**
 * UserController.php
 * Responsabilidades de cada función pública:
 * - Tomar las peticiones desde AngularJS.
 * - Preparar y enviarlas al servicio en PHP.
 * - Recibir las respuesta del servicio en PHP.
 * - Prepararlas y enviarlas de vuelta a AngularJS.
 */

namespace App\Controllers;

use App\Services\UserService;
use Slim\Http\Request;

class UserController {

    private $userService;
    private $nombreCookie = "loggedIn";

    /**
     * UserController constructor.
     */
    public function __construct() {
        $this->userService = new UserService();
    }

    /**
     * Intermediario entre el Front-End y el servicio.
     *
     * @param Request $request
     *
     * @return []
     */
    public function createGame($request) {
        $result = [];

        /**
         * El contenido de las peticiones tipo `POST` se obtiene llamando a `getParsedBody`.
         * El valor de retorno de esa función es un diccionario con el contenido del formulario.
         */
        $formData = $request->getParsedBody();
        $title = 'dede';
        $developer = 'dede';
        $description = 'dede';
        $console = 'dede';
        $releaseDate = 2016-01-01;
        $rate = 4;
        $url = 'https://lh6.googleusercontent.com/-3XfQIrMuPcU/AAAAAAAAAAI/AAAAAAAAAZ8/lFyWhaRInZg/photo.jpg';

        return $this->userService->createGame($title, $developer, $description, $console, $releaseDate, $rate, $ur);
    }

    /**
     * Cierra la sesión del usuario del lado del back-end.
     *
     * @param Request $request
     *
     * @return string []
     */


     public function getDetails() {
            
        $result = [];
        $result = $this->userService->getDetails();

        return $result;
    }


     public function getByID() {
        
        $result = [];
        $result = $this->userService->getByID();

        return $result;
    }

    /**
     * Registra un nuevo usuario en el sistema.
     *
     * @param Request $request
     *
     * @return string []
     */
    public function register($request) {
        $result = [];

        /**
         * TODO: Implementar
         * Pasos
         * - Tome los datos del formulario, similar al método de login.
         * - Verifique que todos los datos existan.
         * - Si efectivamente existen, llame al método `register` del lado del servicio.
         * - Comunique de vuelta al Front-End el resultado de la operación con un array que tenga la misma estructura
         * al que se usó en el método `login`.
         */

        return $result;
    }

}
