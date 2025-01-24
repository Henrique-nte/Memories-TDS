<?php

// Definir credenciais de conexão com o banco de dados
$usuario = 'root';
$senha = '';
$database = 'memories';
$host = 'localhost';

// Criar a conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verificar se ocorreu um erro na conexão
if ($mysqli->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// Caso a conexão seja bem-sucedida
echo "Conexão bem-sucedida!";

?>