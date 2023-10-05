<?php

    $servidor="localhost";
    $baseDatos="app";
    $usuario="root";
    $password="";

    try {
        //code...
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario, $password);

    } catch (Exception $ex) {
        //throw $th;
        echo $ex->getMessage();
    }
    

?>