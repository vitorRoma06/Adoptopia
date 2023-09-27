<?php

include('conexao.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro-Adoptopia</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="body-register">
    <div class="form-box-register">
        <div class="button-close">
            <a href="index.php"><img src="imgs/close.png" alt="close"></a>
        </div>
        <h1 class="title-form bold">Cadastrar</h1>
        <form class="form-login-principal flex-column" action="valida-registro.php" method="POST">
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
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" required> <br>

                        <label for="email">E-mail:</label>
                        <input type="email" name="email" required> <br>

                        <label for="password">Senha:</label>
                        <input type="password" name="senha" required>
                        <div>
                            <button type="button" class="prox-button-register bold">PRÓXIMO</button>
                        </div>
                        <p id="opcao">Você tem uma conta? <a id="amarelo" href="login.php">Faça Login</a></p>
                    </div>

                </div>
                <div class="step step-2">
                    <div class="form-group flex-column  ">
                        <p class="sub-title-etapa bold">Etapa 2 de 2</p>
                        <label for="estado">Estado:</label>
                        <input type="text" name="estado" required> <br>

                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" required> 

                        <label for="telefone">Telefone:</label>
                        <input type="tel" name="telefone" required> <br>

                        <label for="data_nascimento">Data de nascimento:</label>
                        <input type="date" name="data_nascimento" required>
                        <div class="group-buttons flex-row">
                            <button type="button" class="voltar-button-register bold">VOLTAR</button>
                            <button type="submit" class="cadastrar-button bold">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/multistep.js"></script>
</body>

</html>