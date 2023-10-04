<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php' ?>
<title>Quero Doar - Adoptopia</title>
<body>
    <?php include 'header.php' ?>
    <main>
        <!-- Formulário de envio de arquivo e informações do animal -->
        <form action="valida-doacao.php" method="post" enctype="multipart/form-data">
            <!-- Campos de informações do animal -->
            <label for="nome">Nome:</label>
            <!-- input com lógica para deixar a primeira letra maiúscula padronizada-->
            <input type="text" name="nome" required oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);"><br>
            <label for="idade">Idade:</label>
            <input type="number" name="idade" required min="0" max="32"><br>
            <label for="tipo-animal" id="tipo-animal">Tipo de animal:</label><br>
            <input type="text" name="tipo" required oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
            <label for="raca">Raça:</label><br>
            <input type="text" name="raca" required oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
            <label for="cor">Cor:</label>
            <input type="text" name="cor" required oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);"><br>
            <label for="porte">Porte:</label>
            <select name="porte" required>
                <option value="mini">Mini</option>
                <option value="pequeno">Pequeno</option>
                <option value="médio">Médio</option>
                <option value="grande">Grande</option>
                <option value="gigante">Gigante</option>
            </select><br>
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
            <select name="status" required>
                <option value="Disponível">Disponível</option>
                <option value="Indisponível">Indisponível</option>
            </select><br>
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