<?php
include('conexao.php');

function teste()
{

    include('conexao.php');
    if (isset($_POST['email']) || isset($_POST['senha'])) {
        if (strlen($_POST['email'] == 0) || strlen($_POST['senha'] == 0)) {
            echo "Preencha seu email e senha.";
        } else if (strlen($_POST['email']) == 0) {
            echo "Preencha seu email.";
        } else if (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha.";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $qt = $sql_query->num_rows;

            if ($qt == 1) {

                $usuario = $sql_query->fetch_assoc();

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['logado'] = 1;
                $_SESSION['imagem'] = $usuario['imagem'];

                header("Location: index.php");


            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Adoptopia</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="body-login">
    <div class="form-box">
        <div class="button-close">
            <a href="index.php"><img src="imgs/close.png" alt="close"></a>
        </div>
        <h1 class="title-form bold">Login</h1>
        <form class="form-login-principal flex-column" action="login.php" method="POST">
            <div class="div-buttons-social flex-column j-content align-itens">
                <button type="button" class="button-social flex-row align-itens j-content bold"><img
                        src="imgs/google-icon.png" alt="">
                    <p>Login pelo Google</p>
                </button>
                <button type="button" class="button-social flex-row align-itens j-content bold"><img
                        src="imgs/fc-icon.png" alt="">
                    <p>Login pelo Facebook</p>
                </button>
            </div>

            <div class="mid-form flex-row align-itens j-content">
                <hr>ou
                <hr>
            </div>
            <div class="div-inputs flex-column">

                <input type="text" name="email" required="" placeholder="Digite seu e-mail">
                <input type="password" name="senha" required="" autocomplete="off" placeholder="Digite sua senha">
                <p class="fail-login">
                    <?php teste() ?>
                </p>

                <a href="#" class="forgot-button">Esqueceu sua senha?</a>

                <button type="submit" class="login-button bold">ENTRAR</button>
            </div>
        </form>
        <p id="opcao">Você não tem uma conta? <a id="amarelo" href="cadastro.php">Cadastre-se</a></p>
    </div>
</body>


</html>