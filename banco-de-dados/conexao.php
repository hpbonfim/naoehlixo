<?php
// HEROKU DATABASE POSTGRES
// $conn = pg_connect(getenv("DATABASE_URL")) or die('Conexão com banco de dados falhou');


$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'], '/');

// $conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) { // Verificando a conexão
    $servername = "mysql";
    $username = "root";
    $password = "recode";
    $database = "naoehlixo";

    // Criando conexão
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) { // Verificando a conexão
        die("A conexão com o Banco de dados falhou: " . mysqli_connect_error());
    }
}
?>