<?php
//buscar as informações armazenadas em memória referente a saída de informações
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
        include("conexao.php");
        //verificar formulario para autenticação
        $senha = $_POST["senha"];
        $email = $_POST["email"];

        $sql = "SELECT nome FROM usuarios WHERE email='$email' AND senha='$senha'";
        //inicializar a verificação e a sessão
        $resultado =mysqli_query($conexao, $sql);
        $linhas=mysqli_affected_rows($conexao);

            if($linhas>0){
                session_start();
                $_SESSION["usuario"]=$email;
                //redirecionar as informações para outra página
                header("location: index.html");
            } else {
                echo "Dados incorretos! <br>" ;
            }
    ?>
</body>
</html>
