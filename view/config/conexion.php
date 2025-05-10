<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'pagina';

try {
    // Conexxion con PDO ... 
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

} catch (PDOException $e) {
    // Obtenemos el error con ... 
    die('Connection Failed: ' . $e->getMessage());
}


