<?php
// Configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoptopia";

    // Conecte-se ao banco de dados
    $conexao = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }
?>

