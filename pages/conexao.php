<?php

// Definindo as variáveis com as credenciais para conexão ao banco de dados
$usuario = 'root';         // Nome do usuário do banco de dados
$senha = '';               // Senha do banco de dados (vazio para o 'root' por padrão em muitas instalações locais)
$database = 'memories';    // Nome do banco de dados que será utilizado
$host = 'localhost';       // Host do banco de dados (geralmente 'localhost' para desenvolvimento local)

// Criação da conexão com o banco de dados utilizando a classe mysqli
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verificando se ocorreu algum erro na conexão
if ($mysqli->error) {
    // Se houver erro, exibe a mensagem de erro e termina a execução do script
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

// Se não houver erro, a conexão foi estabelecida com sucesso
?>
