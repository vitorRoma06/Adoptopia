<?php
// Configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoptopia";

    // Conecte-se ao banco de dados
    $mysqli = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($mysqli->error) {
        die("Falha na conexão com o banco de dados: " . $mysqli->error);
    }
?>

