<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>

<body>
    <?php include 'header.php' ?>
    <main>
        <!-- Formulário de envio de arquivo e informações do animal -->
        <form action="valida-doacao.php" method="post" enctype="multipart/form-data">
            <!-- Campos de informações do animal -->
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required><br>
            <label for="idade">Idade:</label>
            <input type="text" name="idade" required><br>
            <label for="raca">Raça:</label>
            <input type="text" name="raca" required><br>
            <label for="cor">Cor:</label>
            <input type="text" name="cor" required><br>
            <label for="porte">Porte:</label>
            <input type="text" name="porte" required><br>
            <label for="sexo">Sexo:</label>
            <input type="radio" name="sexo" value="M" required> Masculino
            <input type="radio" name="sexo" value="F" required> Feminino<br>
            <label for="vacinado">Vacinado:</label>
            <input type="radio" name="vacinado" value="S" required> Sim
            <input type="radio" name="vacinado" value="N" required> Não<br>
            <label for="castrado">Castrado:</label>
            <input type="radio" name="castrado" value="S" required> Sim
            <input type="radio" name="castrado" value="N" required> Não<br>
            <label for="patologia">Patologia:</label>
            <input type="text" name="patologia"><br>
            <label for="situacao">Situação:</label>
            <textarea name="situacao" required></textarea><br>
            <label for="status">Status:</label>
            <input type="text" name="status" required><br>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea><br>

            <!-- Campo de upload de imagem -->
            <input type="file" name="arquivo" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" value="Enviar">
        </form>


    </main>
    <?php include 'scripts.php' ?>
</body>

</html>