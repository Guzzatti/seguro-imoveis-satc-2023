<!DOCTYPE html>
<html>
<head>
    <title>Seguradora de Imóveis</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scriptbdseguro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCliente = mysqli_real_escape_string($conn, $_POST['nome_cliente']);
    $enderecoCliente = mysqli_real_escape_string($conn, $_POST['endereco_cliente']);
    $telefoneCliente = mysqli_real_escape_string($conn, $_POST['telefone_cliente']);
    $emailCliente = mysqli_real_escape_string($conn, $_POST['email_cliente']);

    $sql = "INSERT INTO cliente (nome_cliente, endereco_cliente, telefone_cliente, email_cliente) 
            VALUES ('$nomeCliente', '$enderecoCliente', '$telefoneCliente', '$emailCliente')";

    if ($conn->query($sql) === TRUE) {
        echo "Cliente adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar o cliente: " . $conn->error;
    }
}

$sqlImoveisClientes = "SELECT i.*, c.nome_cliente
                       FROM imovel i
                       JOIN cliente c ON i.cliente_id = c.cliente_id";

$resultImoveisClientes = $conn->query($sqlImoveisClientes);
?>

<h1>Seguradora de Imóveis</h1>
<a href="add_imovel.php" class="touchable-button">Adicionar Imóvel</a>

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

<h2>Lista de Imóveis</h2>

<!-- Adicione um input para a pesquisa -->
<input type="text" id="searchInput" onkeyup="search()" placeholder="Pesquisar por cliente">

<table id="imoveisTable" border='1'>
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


<script>
    // Função para realizar a pesquisa
    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("imoveisTable");
        tr = table.getElementsByTagName("tr");

        // Iterar sobre as linhas da tabela e ocultar aquelas que não correspondem à pesquisa
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // 1 é o índice da coluna "Cliente"
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


</body>
</html>

<?php
$conn->close();
?>