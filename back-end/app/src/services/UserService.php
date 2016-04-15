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
    public function getVidGame($title, $developer) {
        $result = [];

        // Verificamos que el title, sin espacios, tenga por lo menos 1 caracter
        if (strlen(trim($title)) > 0) {
            // Verificamos que el title tenga formato de title
            // if (filter_var($title, FILTER_VALIDATE_title)) {
                // Verificamos que el password, sin espacios, tenga por lo menos 1 caracter
                if (strlen(trim($developer)) > 0) {
                    // Si todo lo anterior tuvo éxito, iniciamos el query

                    // El query que vamos a ejecutar en la BD
                    $query = "SELECT id, title, developer FROM videGame WHERE title = :title AND developer = :developer LIMIT 1";

                    // Los parámetros de ese query
                    $params = [":title" => $title, ":developer" => $developer];

                    // Una vez que se cree la base de datos esté lista ésto se puede remover
                    if ($this->isDBReady) {
                        // El resultado de de ejecutar la sentencia se almacena en la variable `result`
                        $result = $this->storage->query($query, $params);

                        // Si la setencia tiene por lo menos una fila, quiere decir que encontramos a nuestro usuario
                        if (count($result['data']) > 0) {
                            // Almacenamos el usuario en la variable `user`
                            $user = $result['data'][0];

                            // Definimos nuestro mensaje de éxito
                            $result["message"] = "User found.";

                            // Enviamos de vuelta a quien consumió el servicio datos sobre el usuario solicitado
                            $result["user"] = [
                                "id" => $user["id"],
                                "title" => $user["title"],
                                "developer" => $user["developer"]
                            ];
                        } else {
                            // No encontramos un usuario con ese title y password
                            $result["message"] = "Invalid credentials.";
                            $result["error"] = true;
                        }
                    } else {
                        // La base de datos no está lista todavía
                        $result["message"] = "Database has not been setup yet.";
                        $result["error"] = true;
                    }
                } else {
                    // El password está en blanco
                    $result["message"] = "Password is required.";
                    $result["error"] = true;
                }
            // } 
            // else {
                // El title no tiene formato de tal
            //     $result["message"] = "title is invalid.";
            //     $result["error"] = true;
            // }
        } else {
            // El title está en blanco
            $result["message"] = "title is required.";
            $result["error"] = true;
        }

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
