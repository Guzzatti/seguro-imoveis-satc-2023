<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance System</title>
</head>
<body>
    <h1>Insurance System</h1>

    <h2>Cliente</h2>
    <form action="processar_cliente.php" method="post">
        Nome: <input type="text" name="nome_cliente"><br>
        Endereco: <input type="text" name="endereco_cliente"><br>
        Telefone: <input type="text" name="telefone_cliente"><br>
        Email: <input type="text" name="email_cliente"><br>
        <input type="submit" value="Adicionar Cliente">
    </form>

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

    // Consultar os clientes no banco de dados
    $sql = "SELECT * FROM Cliente";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os clientes em uma tabela
        echo "<h2>Lista de Clientes</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Telefone</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['ClienteID']."</td>";
            echo "<td>".$row['Nome']."</td>";
            echo "<td>".$row['Endereco']."</td>";
            echo "<td>".$row['Telefone']."</td>";
            echo "<td>".$row['Email']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum cliente encontrado.";
    }

    // Fechar a conexão
    $conn->close();
    ?>

</body>
</html>