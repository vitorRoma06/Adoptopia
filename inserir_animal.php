<?php
include("conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idade = $_POST['idade'];
    $raca = $_POST['raca'];
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $porte = $_POST['porte'];
    $sexo = $_POST['sexo'];
    $vacinado = $_POST['vacinado'];
    $castrado = $_POST['castrado'];
    $patologia = $_POST['patologia'];
    $situacao = $_POST['situacao'];
    $status = $_POST['status'];
    $descricao = $_POST['descricao'];
    
    // Verificar se o parâmetro nomeArquivo está definido na URL
    if (isset($_GET['nomeArquivo'])) {
        $nomeArquivo = $_GET['nomeArquivo'];
    }

    // Inserir os dados do animal na tabela animais
    $sql = "INSERT INTO animais (idade, raca, nome, cor, porte, sexo, vacinado, castrado, patologia, situacao, status, descricao, nomeArquivo)
            VALUES ('$idade', '$raca', '$nome', '$cor', '$porte', '$sexo', '$vacinado', '$castrado', '$patologia', '$situacao', '$status', '$descricao', '$nomeArquivo')";
    if ($conexao->query($sql) === TRUE) {
        echo "<p>Animal inserido com sucesso!</p>";
    } else {
        echo "Erro ao inserir animal: " . $conexao->error;
    }
}
?>

<!-- Formulário de inserção de informações do animal -->
<form action="inserir_animal.php" method="post">
    <label for="idade">Idade:</label>
    <input type="text" name="idade" required><br>
    <label for="raca">Raça:</label>
    <input type="text" name="raca" required><br>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>
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
    <!-- Adicione um campo oculto para passar o nome do arquivo -->
    <input type="hidden" name="nomeArquivo" value="<?php echo $nomeArquivo; ?>">
    <input type="submit" value="Inserir Animal">
</form>
