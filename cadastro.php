<?php
$erro_email = "";
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


        // Função para validar o email
        function validaEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }

        // Consulta para verificar se o email já existe
        $query_verifica_email = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt_verifica_email = $mysqli->prepare($query_verifica_email);
        $stmt_verifica_email->bind_param("s", $email);
        $stmt_verifica_email->execute();
        $stmt_verifica_email->bind_result($email_count);
        $stmt_verifica_email->fetch();
        $stmt_verifica_email->close();

        if (!validaEmail($email)) {
            $erro_email = 'Email inválido';
        } elseif ($email_count > 0) {
            $erro_email = 'Este email já está cadastrado';
        } else {
            $query_usuarios = "INSERT INTO usuarios (nome, email, senha, estado, cidade, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($query_usuarios);
            $stmt->execute([$nome, $email, $senha, $estado, $cidade, $telefone, $data_nascimento]);

            header('Location: login.php');
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>

<body class="body-register">
    <div class="form-box-register">
        <div class="button-close">
            <a href="index.php"><img src="imgs/close.png" alt="close"></a>
        </div>
        <h1 class="title-form bold">Cadastrar</h1>
        <form class="form-login-principal flex-column" action="cadastro.php" method="POST">
            <div class="div-inputs flex-column">
                <div class="step step-1 active">
                    <p class="sub-title-etapa bold">Etapa 1 de 2</p>
                    <div class="div-buttons-social flex-column j-content align-itens">
                        <button type="button" class="button-social flex-row align-itens j-content bold"><img
                                src="imgs/google-icon.png" alt="">
                            <p>Cadastrar pelo Google</p>
                        </button>
                        <button type="button" class="button-social flex-row align-itens j-content bold"><img
                                src="imgs/fc-icon.png" alt="">
                            <p>Cadastrar pelo Facebook</p>
                        </button>
                    </div>

                    <div class="mid-form flex-row align-itens j-content">
                        <hr>ou
                        <hr>
                    </div>
                    <div class="form-group flex-column">

                        <input type="text" name="nome" required placeholder="Digite seu nome">

                        <input type="email" name="email" required placeholder="Digite seu email">

                        <div class="psw flex-row">
                            <input type="password" name="senha" id="password" required placeholder="Digite sua senha">
                            <label class="eyesenha">
                                <input type="checkbox" checked="checked">
                                <svg class="eye" id="icon" onclick="showHide()" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
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

                        <p class="fail-login">
                            <?php echo $erro_email ?>
                        </p>
                        <div>
                            <button type="button" class="prox-button-register bold" id="proxima-etapa">PRÓXIMO</button>

                        </div>
                        <p id="opcao">Você tem uma conta? <a id="amarelo" href="login.php">Faça Login</a></p>
                    </div>

                </div>
                <div class="step step-2">
                    <div class="form-group flex-column">
                        <p class="sub-title-etapa bold">Etapa 2 de 2</p>

                        <input type="text" name="estado" required placeholder="Digite seu estado">


                        <input type="text" name="cidade" required placeholder="Digite sua cidade">

                        <input type="tel" name="telefone" required placeholder="Digite seu telefone">

                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" name="data_nascimento" required placeholder="Data de nascimento">
                        <div class="group-buttons flex-row">
                            <button type="button" class="voltar-button-register bold">VOLTAR</button>
                            <button type="submit" class="cadastrar-button bold">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include 'scripts.php' ?>

</body>

</html>