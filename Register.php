<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("conexao.php");

    // Coletar dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Inserir dados do usuário no banco de dados
    $sql = "INSERT INTO usuarios (nome, email, senha) 
    VALUES ('$nome', '$email', '$senha')";

    if(mysqli_query($conexao, $sql)){
        echo "Usuário cadastrado com sucesso";
    }
        else{
            echo "Erro".mysqli_connect_error($conexao);
        }
        mysqli_close($conexao);
}
?>
