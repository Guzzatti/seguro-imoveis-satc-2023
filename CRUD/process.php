<?php
// Conectar ao banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scriptbdseguro";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Obter os dados do formulário
$nomeCliente = $_POST['nome_cliente'];
$enderecoCliente = $_POST['endereco_cliente'];
$telefoneCliente = $_POST['telefone_cliente'];
$emailCliente = $_POST['email_cliente'];

// Preparar a consulta SQL para inserir os dados
$sql = "INSERT INTO Cliente (Nome, Endereco, Telefone, Email) VALUES ('$nomeCliente', '$enderecoCliente', '$telefoneCliente', '$emailCliente')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente adicionado com sucesso.";
} else {
    echo "Erro ao adicionar o cliente: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>