<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Estilos CSS para os cards de produtos */
        .animal-card {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }

        .animal-card img {
            max-width: 100%;
            height: auto;
        }

        .animal-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }

        .animal-card p {
            font-size: 14px;
            margin: 5px 0;
        }
    </style>
    <title>Adoptopia - Destaque de Animais</title>
</head>

<body>
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
                    while ($animal = $result->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        echo '<img src="' . $animal['path'] . '" alt="' . $animal['nome'] . '">';
                        echo '<h3>' . $animal['nome'] . '</h3>';
                        echo '<p>Idade: ' . $animal['idade'] . ' anos</p>';
                        echo '<p>Raça: ' . $animal['raca'] . '</p>';
                        echo '<p>Cor: ' . $animal['cor'] . '</p>';
                        // Outras informações sobre o animal
                        echo '</div>';
                    }
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
