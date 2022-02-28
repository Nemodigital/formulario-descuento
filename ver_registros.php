<?php

    //Incluir la conexion
    include_once __DIR__ . "/conexion_sqlite.php";

    // Mostrar los registros
    $query = "SELECT * FROM registros";
    $stmt = $baseDatos->query($query);

    // aqui volcamos los registros para verlos en pantalla
    $registros = $stmt->fetchAll(pdo::FETCH_OBJ);

    // mostramos en pantalla
    var_dump($registros);