<!DOCTYPE html>
<html>
<head>
    <title>Seguradora de Imóveis</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

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

// Consulta SQL para obter a lista de imóveis com os nomes dos clientes
$sqlImoveisClientes = "SELECT i.*, c.nome_cliente
                       FROM imovel i
                       JOIN cliente c ON i.cliente_id = c.cliente_id";

$resultImoveisClientes = $conn->query($sqlImoveisClientes);
?>

<h1>Seguradora de Imóveis</h1>
<a href="add_imovel.php" class="touchable-button">Adicionar Imóvel</a>

<!-- Formulário para adicionar cliente -->
<h2>Adicionar Cliente</h2>
<form action="index.php" method="post">
    <label for="nome_cliente">Nome:</label>
    <input type="text" name="nome_cliente" id="nome_cliente" required><br>

    <label for="endereco_cliente">Endereço:</label>
    <input type="text" name="endereco_cliente" id="endereco_cliente" required><br>

    <label for="telefone_cliente">Telefone:</label>
    <input type="text" name="telefone_cliente" id="telefone_cliente" required><br>

    <label for="email_cliente">Email:</label>
    <input type="email" name="email_cliente" id="email_cliente" required><br>

    <input type="submit" name="adicionar_cliente" value="Adicionar Cliente" class="touchable-button">
</form>

<a href="processar_cliente.php" class="touchable-button">Editar Clientes</a>

<!-- Listagem de imóveis com nomes de clientes -->
<h2>Lista de Imóveis</h2>
<table border='1'>
    <tr>
        <th>Imóvel ID</th>
        <th>Cliente</th>
        <th>Endereço</th>
        <th>Tipo de Imóvel</th>
        <th>Valor</th>
    </tr>

    <?php
    while ($row = $resultImoveisClientes->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["imovel_id"] . "</td>
                <td>" . $row["nome_cliente"] . "</td>
                <td>" . $row["endereco_imovel"] . "</td>
                <td>" . $row["tipo_imovel"] . "</td>
                <td>" . $row["valor_imovel"] . "</td>
            </tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Fechar a conexão com o banco de dados
$conn->close();
?>