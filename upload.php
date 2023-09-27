<?php
include("conexao.php");

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
                $mysqli->query("INSERT INTO animais (nomeArquivo, path, created_at)
                                VALUES ('$novoNomeDoArquivo', '$path', NOW())") or die($mysqli->error);

                echo "<p>Arquivo enviado e inserido com sucesso!</p>";
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

$sql_query = $mysqli->query("SELECT nomeArquivo, path, created_at FROM animais") or die($mysqli->error);
?>

<!-- Formulário de envio de arquivo -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="arquivo" accept=".jpg, .png">
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
