<?php


$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$msqli = new mysqli($usuario, $senha, $database, $host);

if($mysqli->error) {
    die("Falha ao conectar com o banco de dados: " . $mysqli->error);
}




?>