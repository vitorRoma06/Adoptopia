<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Adoptopia - Home</title>
</head>

<body>
    <header>
        <nav class="navigation">
            <a href="index.php" class="logo">
                <img src="imgs/logo-only.svg" alt="logo">
                <h1 class="text-logo">Adoptopia</h1>
            </a>
            <ul class="nav-menu">
                <li><a href="#"><i class='bx bx-help-circle'></i></a></li>
                <li><a href="#"><i class='bx bx-cog'></i></a></li>
                <li><a href="#"><i class='bx bx-bell'></i></a></li>
                <li class="nav-item"><a href="upload.php">Quero Doar</a></li>
                <li class="nav-item"><a href="teste.php">Quero Adotar</a></li>
                <?php include 'user.php' ?>
            </ul>
            <input type="checkbox" id="checkbox">
            <label onclick="menuShow()" for="checkbox" class="toggle">
                <div class="bar bar--top"></div>
                <div class="bar bar--middle"></div>
                <div class="bar bar--bottom"></div>
            </label>

        </nav>
        <div class="mobile-menu">
            <ul class="nav-menu">
                <li class="nav-item"><a href="teste.php">Quero Doar</a></li>
                <li class="nav-item"><a href="#">Quero Adotar</a></li>
                <li class="nav-item"><a href="#">Configurações</a></li>
                <li class="nav-item"><a href="#">Notificações</a></li>
                <li class="nav-item"><a href="login.php">Entrar</a></li>
                <li class="nav-item"><a href="cadastro.php">Cadastrar</a></li>
                <li class="nav-item"><a href="#">Ajuda</a></li>
            </ul>
        </div>
    </header>
    <main>
    </main>
    <script src="js/responsive.js"></script>
    <script src="js/user-profile.js"></script>
    

</body>

</html>