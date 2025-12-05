<?php
$host     = 'localhost';
$user     = 'root';
$password = '';
$database = 'projetopw2';

$conexao = mysqli_connect($host, $user, $password, $database);

if (!$conexao) {
    die('Erro ao conectar ao MySQL: ' . mysqli_connect_error());
}
?>