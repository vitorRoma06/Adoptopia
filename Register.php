<?php
// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
    include("conexao.php");

    // Coleta os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $telefone = $_POST["telefone"];
    
    // Coleta a data de nascimento do formulário
    $data_nascimento = $_POST["data_nascimento"];

    // Converte a data para o formato correto "AAAA-MM-DD"
    $data_nascimento = date("Y-m-d", strtotime(str_replace('/', '-', $data_nascimento)));

    // Prepara a consulta SQL para inserir dados na tabela 'usuarios'
    $query_usuarios = "INSERT INTO usuarios (nome, email, senha, estado, cidade, telefone, data_nascimento) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepara a declaração SQL com os valores a serem inseridos
    $stmt = $conexao->prepare($query_usuarios);
    
    // Liga os parâmetros da declaração aos valores das variáveis
    $stmt->bind_param("sssssss", $nome, $email, $senha, $estado, $cidade, $telefone, $data_nascimento);
    
    // Executa a consulta SQL
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso";
        exit; // Linha para interromper a execução do código aqui
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Consulta os usuários cadastrados e exibe as datas de nascimento formatadas
    $query_usuario = "SELECT id, email, data_nascimento FROM usuarios";
    
    $result_usuario = $conexao->query($query_usuario);

    if ($result_usuario) {
        while ($row_notification = $result_usuario->fetch_assoc()) {
            var_dump($row_notification);
        }
    } else {
        echo "Erro na consulta de notificações: " . $conexao->error;
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
}
?>
