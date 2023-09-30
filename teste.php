<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Adoptopia - Destaque de Animais</title>
</head>

<body>
<script>
    // Recupera o tamanho da fonte do localStorage
    const storedFontSize = localStorage.getItem('fontSize');
    if (storedFontSize) {
        document.body.style.fontSize = `${storedFontSize}px`;
    }
</script>

    <main>
        <section class="destaque">
            <h2>Animais Disponíveis para Adoção</h2>
            <?php
            include("conexao.php");
            $sql = "SELECT * FROM animais WHERE status = 'D'"; // Supondo que 'D' representa animais disponíveis
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo '<section class="destaque">';
                    while ($animal = $result->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        echo  '<img height="300" width="300" src="' . $animal['path'] . '" alt="' . $animal['nome'] . '">';
                        echo '<h3>' . $animal['nome'] . '</h3>';
                        echo '<p>Idade: ' . $animal['idade'] . ' anos</p>';
                        echo '<p>Raça: ' . $animal['raca'] . '</p>';
                        echo '<p>Cor: ' . $animal['cor'] . '</p>';
                        // Outras informações sobre o animal
                        echo '</div>';
                    }
                    echo '</section>';
                } else {
                    echo '<p>Nenhum animal disponível para adoção no momento.</p>';
                }
                $stmt->close();
            } else {
                echo '<p>Ocorreu um erro ao buscar os animais disponíveis.</p>';
            }
            $mysqli->close();
            ?>
        </section>
    </main>
    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
</body>

</html>
