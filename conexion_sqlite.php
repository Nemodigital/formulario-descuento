<?php
// Instancia PDO para conexión SQLITE

// Creación de Base de Datos usuarios.db. La BD queda en el mismo directorio
$baseDatos = new PDO("sqlite:" . __DIR__ . "/usuarios.db");
// configuramos los errores
$baseDatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Definición de la tabla para sqlite si NO existe
$definicionTabla = "CREATE TABLE IF NOT EXISTS registros(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    dni TEXT NOT NULL,
    nombre TEXT NOT NULL,
    telefono TEXT NOT NULL,
    email TEXT NOT NULL,
    direccion TEXT NOT NULL,
    provincia TEXT NOT NULL,
    ciudad TEXT NOT NULL
    
);";
// creamos la tabla
$resultado = $baseDatos->exec($definicionTabla);
// echo "Tabla creada correctamente";
