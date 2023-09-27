<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Adoptopia - Destaque de Animais</title>
</head>
<body>
    <header>
        <!-- Seu cabeçalho e navegação aqui -->
    </header>
    <main>
        <section class="destaque">
            <h2>Animais Disponíveis para Adoção</h2>
            <!-- Aqui você pode listar os animais em destaque -->
    <?php 
            include("conexao.php");
            $sql = "SELECT * FROM animais WHERE Status = 'D'"; // Supondo que 'D' representa animais disponíveis
                    //conn
            $result = $conexao->query($sql);
            
            if ($result->num_rows > 0) {
                // Passo 3: Exibir os animais disponíveis na seção
                echo '<section class="destaque">';
                echo '<h2>Animais Disponíveis para Adoção</h2>';
            
                while ($animal = $result->fetch_assoc()) {
                    echo '<div class="animal-card">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($animal['foto']) . '" alt="' . $animal['nome'] . '">';
                    echo '<h3>' . $animal['nome'] . '</h3>';
                    echo '<p>Idade: ' . $animal['idade'] . ' anos</p>';
                    echo '<p>Raça: ' . $animal['Raca'] . '</p>';
                    echo '<p>Cor: ' . $animal['Cor'] . '</p>';
                    // Outras informações sobre o animal
                    echo '</div>';
                }
            
                echo '</section>';
            } else {
                echo '<p>Nenhum animal disponível para adoção no momento.</p>';
            }
            
    $conexao->close();
    ?>

        </section>
        <section class="registro-login">
            <div class="registro">
                <h2>Registrar-se</h2>
                <!-- Seu formulário de registro aqui -->
                <form action="Register.php" method="POST">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                    <!-- Outros campos de registro -->
                    <button type="submit">Registrar</button>
                </form>
            </div>
            <div class="login">
                <h2>Entrar</h2>
                <!-- Seu formulário de login aqui -->
                <form action="login_process.php" method="POST">
                    <label for="login_username">Nome de Usuário:</label>
                    <input type="text" id="login_username" name="username" required>
                    <label for="login_password">Senha:</label>
                    <input type="password" id="login_password" name="password" required>
                    <button type="submit">Entrar</button>
                </form>
                <!-- Adicione a opção de login com mídias sociais aqui -->
                <p>Ou entre com:</p>
                <a href="login_with_facebook.php">Facebook</a> | <a href="login_with_google.php">Google</a>
            </div>
        </section>
    </main>
    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
</body>
</html>
