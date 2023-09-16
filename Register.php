<?php
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

    // Hash da senha para segurança (recomenda-se usar funções mais seguras)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Inserir dados do usuário no banco de dados
    $sql = "INSERT INTO usuarios (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // Registro bem-sucedido, redirecione para a página de login ou outra página relevante
        header("Location: login.php");
    } else {
        echo "Erro ao registrar: " . $conn->error;
    }

    $conn->close();
} else {
    // Se o formulário não foi enviado, redirecione para a página de registro ou outra página relevante
    header("Location: register.php");
}
?>
