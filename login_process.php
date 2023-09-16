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
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta SQL para buscar o usuário com base no nome de usuário
    $sql = "SELECT id, username, password FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Login bem-sucedido, crie uma sessão e redirecione para a página de perfil ou outra página relevante
            $_SESSION["user_id"] = $row["id"];
            header("Location: profile.php");
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Nome de usuário não encontrado.";
    }

    $conn->close();
} else {
    // Se o formulário não foi enviado, redirecione para a página de login ou outra página relevante
    header("Location: login.php");
}
?>
