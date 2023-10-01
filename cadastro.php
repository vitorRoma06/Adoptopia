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


                        <input type="password" name="senha" required placeholder="Digite sua senha">
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