<!DOCTYPE html>
<html>
<head>
    <title>Seguradora de Imóveis</title>
    <link rel="stylesheet" href="processar_cliente.css">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scriptbdseguro2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o botão de alterar foi clicado
    if (isset($_POST["alterar"])) {
        $cliente_id = $_POST["alterar"];
        // Implemente a lógica para ação de alterar aqui
        $novo_nome = $POST["novo_nome$cliente_id"];
        $novo_endereco = $POST["novo_endereco$cliente_id"];
        $novo_telefone = $POST["novo_telefone$cliente_id"];
        $novo_email = $POST["novo_email$cliente_id"];

        $sql = "UPDATE cliente SET nome_cliente='$novo_nome', endereco_cliente='$novo_endereco', telefone_cliente='$novo_telefone', email_cliente='$novo_email' WHERE cliente_id=$cliente_id";

        if ($conn->query($sql) === TRUE) {
            echo "Cliente alterado com sucesso!";
        } else {
            echo "Erro ao alterar o cliente: " . $conn->error;
        }
    }

    // Verifica se o botão de excluir foi clicado
    elseif (isset($_POST["excluir"])) {
        $cliente_id = $_POST["excluir"];
        // Implemente a lógica para ação de excluir aqui
        $sql = "DELETE FROM cliente WHERE cliente_id=$cliente_id";

        if ($conn->query($sql) === TRUE) {
            echo "Cliente excluído com sucesso!";
        } else {
            echo "Erro ao excluir o cliente: " . $conn->error;
        }
    }
}

// Recuperar e exibir a lista de clientes
$sqlClientes = "SELECT cliente_id, nome_cliente, endereco_cliente, telefone_cliente, email_cliente FROM cliente";
$resultClientes = $conn->query($sqlClientes);

if ($resultClientes->num_rows > 0) {
    echo "<br><a href='index.php'><button>Voltar para a Página Inicial</button></a>";
    echo "<h2>Lista de Clientes:</h2>";
    echo "<form method='post' action='processar_cliente.php'>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>";

    while ($row = $resultClientes->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["cliente_id"] . "</td>
                <td><input type='text' name='novo_nome_" . $row["cliente_id"] . "' value='" . $row["nome_cliente"] . "'></td>
                <td><input type='text' name='novo_endereco_" . $row["cliente_id"] . "' value='" . $row["endereco_cliente"] . "'></td>
                <td><input type='text' name='novo_telefone_" . $row["cliente_id"] . "' value='" . $row["telefone_cliente"] . "'></td>
                <td><input type='text' name='novo_email_" . $row["cliente_id"] . "' value='" . $row["email_cliente"] . "'></td>
                <td>
                    <button type='submit' name='alterar' value='" . $row["cliente_id"] . "'>Alterar</button>
                    <button type='submit' name='excluir' value='" . $row["cliente_id"] . "'>Excluir</button>
                </td>
            </tr>";
    }

    echo "</table>";
    echo "</form>";

    
} else {
    echo "<br><a href='index.php'><button>Voltar para a Página Inicial</button></a>";
    echo "Nenhum cliente encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
</body>
</html>
