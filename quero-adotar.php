<?php
session_start();
include("conexao.php");

$filtroStatus = filter_input(INPUT_GET, 'tipo-animal', FILTER_SANITIZE_STRING);
$filtroStatus = in_array($filtroStatus, ['Cachorro', 'Gato']) ? $filtroStatus : '';

$filtroVacinado = filter_input(INPUT_GET, 'vacinado', FILTER_SANITIZE_STRING);
$filtroVacinado = in_array($filtroVacinado, ['S', 'N']) ? $filtroVacinado : '';

$condicioes = [
    strlen($filtroStatus) ? 'tipo_animal = "' . $filtroStatus . '"' : null,
    strlen($filtroVacinado) ? 'vacinado = "' . $filtroVacinado . '"' : null
];

$condicioes = array_filter($condicioes);

$where = implode(' AND ', $condicioes);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<title>Quero Adotar - Adoptopia</title>

<body>
    <?php include 'header.php' ?>
    <main class="principal-quero-doar flex-row">
        <aside class="barra-lateral-filtros">
            <h1 class="titulo-filtros j-content flex-column align-itens">Filtros</h1>
            <form method="get" class="form-filtro flex-column">
                <label>Tipo do Animal</label>
                <select name="tipo-animal">
                    <option value="">Todos</option>
                    <option value="Cachorro">Cachorro</option>
                    <option value="Gato">Gato</option>
                </select>

                <label>Vacinado</label>
                <select name="vacinado">
                    <option value="">Todos</option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
                <button class="filtrar-button" type="submit">Filtrar</button>
            </form>
        </aside>
        <div class="principal-conteudo-quedo-doar flex-column">
            <h2 class="titulos-paginas">Animais Disponíveis para Adoção</h2>
            <section class="animais-disponiveis flex-row j-content">
                <?php

                $sql = "SELECT * FROM animais";
                if (!empty($where)) {
                    $sql .= " WHERE $where";
                }
                $stmt = $mysqli->prepare($sql);

                if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($animal = $result->fetch_assoc()) {
                            ?>

                            <div class="post-animal flex-column">
                                <img src="<?php echo $animal['imagem'] ?>" alt="<?php echo $animal['nome'] ?>"
                                    class="post-animal-img">
                                <p class="post-animal-nome">
                                    <?php echo $animal['nome'] ?>
                                </p>
                                <p class="post-animal-descricao">
                                    <?php echo $animal['descricao'] ?>
                                </p>
                                <img src="
                            <?php
                            if ($animal['sexo'] == 'M') {
                                echo "imgs/macho.png";
                            } else {
                                echo "imgs/femea.png";
                            }
                            ?>" alt="" class="post-animal-sexo">
                                <button class="post-animal-button">Ver mais</button>
                            </div>

                            <?php
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
        </div>


    </main>
    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
    <?php include 'scripts.php' ?>

</body>

</html>