<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basededatos = "hermoza";

    try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario,$clave);
    }

    catch (Exception $th) {
        echo $th->getMessage();
    }
    


?>