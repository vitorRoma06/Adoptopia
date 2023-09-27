<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include("conexao.php");

    try {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $estado = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $telefone = $_POST["telefone"];

        $data_nascimento = $_POST["data_nascimento"];

        $data_nascimento = date("Y-m-d", strtotime(str_replace('/', '-', $data_nascimento)));


        $query_usuarios = "INSERT INTO usuarios (nome, email, senha, estado, cidade, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($query_usuarios);
        $stmt->execute([$nome, $email, $senha, $estado, $cidade, $telefone, $data_nascimento]);

        header('Location: login.php');
        exit();
    } catch (PDOException $e) {
        echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }

}
?>