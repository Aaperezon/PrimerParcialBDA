<?php

class Database{
    public function connect(){
        $servername = "bd-feb21.c3z0uchvmpn0.us-east-1.rds.amazonaws.com:3306";
        $username = "adminAndrea";
        $password = "Andrea**";
        /*
        $servername = "localhost";
        $username = "root";
        $password = "";
        */
        try{
            return new PDO("mysql:host=$servername;dbname=ProyectoP1BDA", $username, $password,
                [
                    /**
                     * Activar el manejo de errores y retornar una exception.
                     */
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    /**
                     * Cambiar el modo de gestion de datos en el software
                     * En este caso queremos que retorne objetos.
                     */
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

}



