<?php
include("conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do animal
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

    // Teste de arquivo
    if (isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];
        if ($arquivo['error']) {
            die("Falha ao enviar arquivo");
        }

        $nomeDoArquivo = $_FILES['arquivo']['name'];
        $tamanhoDoArquivo = $_FILES['arquivo']['size'];
        $extensaoDoArquivo = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        // Verifica se o tamanho do arquivo é menor ou igual a 2 MB (2 * 1024 * 1024 bytes)
        if ($tamanhoDoArquivo <= 2 * 1024 * 1024) {
            // Verifica se a extensão do arquivo é jpg ou png
            if ($extensaoDoArquivo === 'jpg' || $extensaoDoArquivo === 'png') {
                // Diretório de destino para o upload
                $diretorioDestino = 'uploads/';

                // Gere um nome único para o arquivo
                $novoNomeDoArquivo = uniqid() . '.' . $extensaoDoArquivo;

                $path = $diretorioDestino . $novoNomeDoArquivo;

                $deu_certo = move_uploaded_file($_FILES['arquivo']['tmp_name'], $path);

                if ($deu_certo) {
                    // Inserir informações na tabela animais
                    $sql = "INSERT INTO animais (idade, raca, nome, cor, porte, sexo, vacinado, castrado, patologia, situacao, status, descricao, nomeArquivo, path, created_at)
                            VALUES ('$idade', '$raca', '$nome', '$cor', '$porte', '$sexo', '$vacinado', '$castrado', '$patologia', '$situacao', '$status', '$descricao', '$novoNomeDoArquivo', '$path', NOW())";

                    if ($mysqli->query($sql) === TRUE) {
                        echo "<p>Animal inserido com sucesso!</p>";
                    } else {
                        echo "Erro ao inserir animal: " . $mysqli->error;
                    }
                } else {
                    echo 'Erro ao fazer upload do arquivo.';
                }
            } else {
                echo 'Tipo de arquivo não aceito. Apenas arquivos JPG e PNG são permitidos.';
            }
        } else {
            echo 'O tamanho do arquivo excede 2 MB.';
        }
    }
}

$sql_query = $mysqli->query("SELECT nomeArquivo, path, created_at FROM animais") or die($mysqli->error);
?>

<!-- Formulário de envio de arquivo e informações do animal -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <!-- Campos de informações do animal -->
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

    <!-- Campo de upload de imagem -->
    <input type="file" name="arquivo" accept=".jpg, .png">
    <input type="submit" value="Enviar">
    <input type="submit" value="Enviar">
</form>

<table border="1" cellpadding="10">
    <thead>
        <th>Preview</th>
        <th>Arquivo</th>
        <th>Data de Envio</th>
    </thead>
    <tbody> 
        <?php 
        while($arquivo = $sql_query->fetch_assoc()){
        ?>
        <tr>
            <td><img height="50" src="<?php echo $arquivo['path']; ?>" alt=""></td>
            <td><a target="_blank" href="<?php echo $arquivo['path']; ?>"><?php echo $arquivo['nomeArquivo']; ?></a></td>
            <td><?php echo date("d/m/Y H:i", strtotime($arquivo['created_at'])); ?></td>
        </tr>
        <?php  
        }
        ?>
    </tbody>
</table>
