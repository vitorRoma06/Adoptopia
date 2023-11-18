<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoptopia";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    if ($mysqli->error) {
        die("Falha na conexão com o banco de dados: " . $mysqli->error);
    }
?>

