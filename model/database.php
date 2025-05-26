<?php

// $server = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'pagina';

$server = 'sql110.infinityfree.com';
$username = 'if0_38701325';
$password = 'IuPtXNE4JfMahHX';
$database = 'if0_38701325_pagina';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>

