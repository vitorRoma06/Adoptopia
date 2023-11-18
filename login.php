<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0 || strlen($_POST['senha']) == 0) {
        $message[] = "Preencha seu email e senha.";
    } else if (strlen($_POST['email']) == 0) {
        $message[] = "Preencha seu email.";
    } else if (strlen($_POST['senha']) == 0) {
        $message[] = "Preencha sua senha.";
    } else {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows > 0) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['logado'] = 1;
                $_SESSION['imagem'] = $usuario['imagem'];

                header("Location: index.php");
            } else {
                $message[] = "Falha ao logar! E-mail ou senha incorretos";
            }
        } else {
            $message[] = "Falha ao logar! E-mail ou senha incorretos";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include "head.php" ?>
    <title>Login - Adoptopia</title>

</head>

<body class="body-login flex-column j-content align-itens">
    <div class="form-box">
        <div class="button-close">
            <a href="index.php"><img src="imgs/close.png" alt="close"></a>
        </div>
        <h1 class="title-form bold">Login</h1>
        <form class="form-login-principal flex-column" action="login.php" method="POST">
            <div class="div-inputs flex-column">

                <input type="text" name="email" required="" placeholder="Digite seu e-mail">
                <div class="psw flex-row">
                    <input type="password" name="senha" id="password" required placeholder="Digite sua senha">
                    <label class="eyesenha">
                        <input type="checkbox" checked="checked">
                        <svg class="eye" id="icon" onclick="showHide()" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 576 512">
                            <path
                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z">
                            </path>
                        </svg>
                        <svg class="eye-slash" onclick="showHide()" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 640 512">
                            <path
                                d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z">
                            </path>
                        </svg>
                    </label>
                </div>
                <?php if (isset($message)) {
                    foreach ($message as $message) {
                        echo '<div class="fail-login">' . $message . '</div>';
                    }
                } ?>

                <button type="submit" class="login-button bold">ENTRAR</button>
            </div>
        </form>
        <p id="opcao">Você não tem uma conta? <a id="amarelo" href="cadastro.php">Cadastre-se</a></p>
    </div>
    <?php include "scripts.php" ?>
</body>


</html>