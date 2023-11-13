<?php
session_start();
include("conexao.php");
include("validacao-filtros.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<title>Home - Adoptopia</title>

<body>
    <?php include 'header.php' ?>
    <main class="main-index flex-column j-content align-itens">
        <?php include 'slides.php' ?>
        <?php include 'animais-na-regiao.php' ?>
    </main>
    <footer class="rodape flex-column align-itens j-content">
        <img src="imgs/logo-rodape.svg" alt="logo-rodape">
        <div>
            <p>&copy; 2023 - 2023 Adoptopia - Todos direitos reservados.</p>
        </div>

    </footer>
    <script src="js/ver-mais-quero-adotar.js"></script>

    <?php include 'scripts.php' ?>
</body>

</html>