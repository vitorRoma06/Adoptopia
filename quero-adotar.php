<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
include("conexao.php");
include("validacao-filtros.php");

function imagemSexo($animal)
{
    if ($animal['sexo'] == 'Macho') {
        return "imgs/macho.png";
    } else {
        return "imgs/femea.png";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'head.php' ?>
    <title>Quero Adotar - Adoptopia</title>
</head>

<body>

    <div id="overlay" style="display: none;"></div>
    <div id="overlay2" style="display: none;"></div>
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
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
                <button class="filtrar-button" type="submit">Filtrar</button>
            </form>
        </aside>
        <div class="principal-conteudo-quedo-doar flex-column">
            <h2 class="titulos-paginas">Animais Disponíveis para Adoção</h2>
            <section class="animais-disponiveis flex-row j-content">
                <?php

                $postPorPagina = 8;
                $paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
                $offset = ($paginaAtual - 1) * $postPorPagina;

                $sql = "SELECT * FROM animais AS a LEFT JOIN usuarios AS u ON (a.id_usuario = u.id) LIMIT $postPorPagina OFFSET $offset";
                if (!empty($where)) {
                    $sql .= " WHERE $where";
                }
                $stmt = $mysqli->prepare($sql);

                if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($animal = $result->fetch_assoc()) {

                            include("post-animal.php");

                        }
                    } else {
                        echo '<p>Nenhum animal disponível para adoção no momento.</p>';
                    }
                    $stmt->close();
                } else {
                    echo '<p>Ocorreu um erro ao buscar os animais disponíveis.</p>';
                }
                $sqlTotal = "SELECT COUNT(*) as total FROM animais";
                $resultTotal = $mysqli->query($sqlTotal);
                $rowTotal = $resultTotal->fetch_assoc();
                $totalDePostagens = $rowTotal['total'];
                $totalDePaginas = ceil($totalDePostagens / $postPorPagina);

                $mysqli->close();
                ?>
            </section>
            <?php
            echo '<div class="paginacao-postagens">';
            for ($i = 1; $i <= $totalDePaginas; $i++) {
                if ($i == $paginaAtual) {
                    echo "<span>$i</span>";
                } else {
                    echo "<a href=\"?pagina=$i\">$i</a>";
                }
            }
            echo '</div>'; ?>
        </div>


    </main>
    <?php include 'scripts.php' ?>
    <script src="js/ver-mais-quero-adotar.js"></script>

</body>

</html>