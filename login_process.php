<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configurações do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sistemaadopt";

    // Conecte-se ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifique a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Coletar dados do formulário
    
    $email= $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para buscar o usuário com base no nome de usuário
    $sql = "SELECT id, nome, usuario, senha FROM usuarios WHERE usuario = '$email' && WHERE senha = '$password'";
    $result = $conn->query($sql);

    
?>
