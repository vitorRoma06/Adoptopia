<?php
//buscar as informações armazenadas em memória referente a saída de informações
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão do usuário</title>
</head>
<body>
    <?php 
        session_start();
        if(!isset($_SESSION["usuario"])){
            echo "Erro!";
            exit();
        }
        echo "Olá, ".$_SESSION["usuario"];
        echo "<br>";
    ?>
<!-- espaço para colocar conteúdo do perfil do usuario -->

</body>
</html>


