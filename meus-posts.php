<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
include("conexao.php");

function imagemSexo($animal)
{
    if ($animal['sexo'] == 'Macho') {
        return "imgs/macho.png";
    } else {
        return "imgs/femea.png";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post-id'])) {

    $postId = $_POST['post-id'];

    $sql = "DELETE FROM animais WHERE id_post = $postId";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->execute();
        $stmt->close();
    }

    $mysqli->close();

    header("Location: meus-posts.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'head.php' ?>
    <title>Meus Posts - Adoptopia</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main class="main-meus-posts flex-row">
        <div class="principal-meus-posts flex-column">
            <h2 class="titulos-paginas">Meus Posts:</h2>
            <section class="meus-posts flex-row">
                <?php

                $userId = $_SESSION['id'];

                $sql = "SELECT * FROM animais AS a LEFT JOIN usuarios AS u ON (a.id_usuario = u.id) where a.id_usuario = $userId";

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
                                <img src="<?php echo $animal['imagem_pet'] ?>" alt="<?php echo $animal['nome_pet'] ?>"
                                    class="post-animal-img">
                                <p class="post-animal-nome">
                                    <?php echo $animal['nome_pet'] ?>
                                </p>
                                <p class="post-animal-descricao">
                                    <?php echo $animal['cidade'] . " - " . $animal['bairro'] ?>
                                </p>
                                <img src="<?php echo imagemSexo($animal); ?>" alt="imagem-sexo-animal" class="post-animal-sexo">

                                <form method="POST" action="meus-posts.php">
                                    <input type="hidden" name="post-id" value="<?php echo $animal['id_post']; ?>">
                                    <button type="submit" class="post-animal-button red-button">Apagar Post</button>
                                </form>


                            </div>

                            <?php

                        }
                    } else {
                        echo '<p>Você não tem nenhum post.</p>';
                    }
                    $stmt->close();
                } else {
                    echo '<p>Ocorreu um erro ao ver seus posts.</p>';
                }

                $mysqli->close();
                ?>
            </section>
        </div>
    </main>

    <?php include 'scripts.php' ?>
    <script src="js/ver-mais-quero-adotar.js"></script>
</body>

</html>