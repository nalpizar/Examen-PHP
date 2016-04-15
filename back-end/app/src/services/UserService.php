<?php
namespace App\Services;

error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * UserService.php
 */



class UserService {

    private $storage;
    private $isDBReady = true;  //cambiamos esto de fase  a true por que ya esta lista base da datos

    /**
     * UserService constructor.
     */
    public function __construct() {
        // Verificación de la base de datos
        if ($this->isDBReady) {
            $this->storage = new StorageService();
        }
    }

    /**
     * Encargado de iniciar la sesión del usuario.
     *
     * @param string $title
     * @param string $developer
     *
     * @return array
     */
    public function createGame($title, $developer, $description, $console, $releaseDate, $rate, $url) {
        $result = [];


        $query = "INSERT INTO videGame (title, developer, description, console, releaseDate, rate, url) VALUES (:title, :developer, :description, :console, :releaseDate, :rate, :url)";
            $parametros = [
                ":title" => $title,
                ":developer" => $developer,
                ":description" => $description,
                ":console" => $console,
                ":releaseDate" => $releaseDate,
                ":rate" => $rate,
                ":url" => $url

            ];

            $result = $this->storage->query($query, $parametros);

            return $result;
    }


    public function getByID() {
        $result = [];
        $query = "SELECT * From videGame";



        if ($this->isDBReady) {
                        // El resultado de de ejecutar la sentencia se almacena en la variable `result`
                        $resultado = $this->storage->query($query);

                        // Si la setencia tiene por lo menos una fila, quiere decir que encontramos a nuestro usuario
                        if (count($resultado['data']) > 0) {
                            // Almacenamos el usuario en la variable `user`
                            $details = $resultado['data'][0];
                            // Definimos nuestro mensaje de éxito
                            $result["message"] = "Game found.";

                            // Enviamos de vuelta a quien consumió el servicio datos sobre el usuario solicitado
                            $result["details"] = [
                                "id" => $details["id"],
                                "title" => $details["title"],
                                "console" => $details["console"],
                                "releaseDate" => $details["releaseDate"]
                            ];
                        } else {
                            // No encontramos un usuario con ese title y password
                            $result["message"] = "Invalid credentials.";
                            $result["error"] = true;
                        }
                    }

        return $result;
    }

    public function getDetails() {
    $result = [];
    $query = "SELECT * From videGame";



    if ($this->isDBReady) {
                    // El resultado de de ejecutar la sentencia se almacena en la variable `result`
                    $resultado = $this->storage->query($query);

                    // Si la setencia tiene por lo menos una fila, quiere decir que encontramos a nuestro usuario
                    if (count($resultado['data']) > 0) {
                        // Almacenamos el usuario en la variable `user`
                        $details = $resultado['data'];
                        // Definimos nuestro mensaje de éxito
                        $result["message"] = "User found.";

                        // Enviamos de vuelta a quien consumió el servicio datos sobre el usuario solicitado
                            foreach ($details as $vidList) {
                                 $result["data"][] = [
                                "id" => $vidList["id"],
                                "title" => $vidList["title"],
                                "console" => $vidList["console"],
                                "releaseDate" => $vidList["title"]
                            ]; 
                        }


                       
                    } else {
                        // No encontramos un usuario con ese title y password
                        $result["message"] = "Invalid game.";
                        $result["error"] = true;
                    }
                }

    return $result;
}




    /**
     * Registra un nuevo usuario en el sistema.
     *
     * @param string $title
     * @param string $developer
     * @param string $developerConfirm
     * @param string $fullName
     *
     * @return array
     */

}
