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
        <?php include 'slides.php' ?>
    </main>

    <section class="animais-regiao">
        
    </section>
    

    <?php include 'scripts.php' ?>
</body>

</html>