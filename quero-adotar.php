<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
include("conexao.php");
include("validacao-filtros.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'head.php' ?>
    <title>Quero Adotar - Adoptopia</title>
</head>

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

                $sql = "SELECT * from 
                animais as a
                left join usuarios as u on (a.id_usuario = u.id)";
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
                $mysqli->close();
                ?>
            </section>
        </div>


    </main>
    <footer>
        <!-- Seu rodapé aqui -->
    </footer>
    <?php include 'scripts.php' ?>
    <script src="js/ver-mais-quero-adotar.js"></script>

</body>

</html>