<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scriptbdseguro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recuperar a lista de clientes para exibição no dropdown
$sqlClientes = "SELECT cliente_id, nome_cliente FROM cliente";
$resultClientes = $conn->query($sqlClientes);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $endereco = $_POST["endereco"];
    $tipoImovel = $_POST["tipoImovel"];
    $valorImovel = $_POST["valorImovel"];
    $cliente_id = $_POST["cliente_id"];

    $sql = "INSERT INTO imovel (cliente_id, endereco_imovel, tipo_imovel, valor_imovel) 
            VALUES ('$cliente_id', '$endereco', '$tipoImovel', '$valorImovel')";

    if ($conn->query($sql) === TRUE) {
        echo "Imóvel adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar imóvel: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Imóveis</title>
    <link rel="stylesheet" href="add_imovel.css">

</head>
<body>

    <h1>Gerenciar Imóveis</h1>

    <form method="post" action="add_imovel.php">
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required>

        <label for="tipoImovel">Imóvel:</label>
        <input type="text" name="tipoImovel" required>

        <label for="valorImovel">Valor do Imóvel:</label>
        <input type="text" name="valorImovel" required>

        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" required>
            <?php
            while ($row = $resultClientes->fetch_assoc()) {
                echo "<option value='" . $row["cliente_id"] . "'>" . $row["nome_cliente"] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Adicionar Imóvel</button>
    </form>

    <!-- Adicione aqui a listagem de imóveis existentes, se necessário -->

    <br>
    <a href="index.php">Voltar para a Página Inicial</a>

</body>
</html>