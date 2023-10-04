<?php
session_start();
include("conexao.php");
$tipo_animal = isset($_GET['tipo_animal']) ? $_GET['tipo_animal'] : 'todos';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<title>Home - Adoptopia</title>
<body>
    <?php include 'header.php' ?>
    <main class="main">
        <form action="quero-adotar.php" method="get">
            <label for="tipo_animal">Filtrar por tipo de animal:</label>
            <select id="tipo_animal" name="tipo_animal">
            <option value="todos">Todos</option>
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <!-- espaço para adicionar mais opções caso necessário -->
            </select>
            <button type="submit">Filtrar</button>
        </form>

    <main class="main">
        <?php include 'slides.php' ?>
        <section class="destaque">
            <h2>Animais Disponíveis para Adoção</h2>

            <?php
            // Ajuste a consulta SQL com base no tipo de animal selecionado
            if ($tipo_animal === 'todos') {
                $sql = "SELECT * FROM animais";
                $stmt = $mysqli->prepare($sql);
            } else {
                $sql = "SELECT * FROM animais WHERE tipo = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("s", $tipo_animal);
            }

            if ($stmt) {
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($animal = $result->fetch_assoc()) {
                        echo '<div class="animal-card">';
                        echo '<img src="' . $animal['imagem'] . '" alt="' . $animal['nome'] . '">';
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
    <?php include 'scripts.php' ?>

</body>

</html>