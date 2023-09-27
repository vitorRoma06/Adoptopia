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
             <!-- Botão para a página de upload de arquivo -->
             <a href="upload.php" class="btn-upload">Fazer Upload de Arquivo</a>
    <?php 
            include("conexao.php");
            $sql = "SELECT * FROM animais WHERE Status = 'D'"; // Supondo que 'D' representa animais disponíveis
                    //conn
            $result = $conexao->query($sql);
            
            if ($result->num_rows > 0) {
                // Passo 3: Exibir os animais disponíveis na seção
                echo '<section class="destaque">';
            
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

    </main>
    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
</body>
</html>
