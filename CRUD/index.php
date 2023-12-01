<!DOCTYPE html>
<html>
<head>
    <title>Seguro de Imóveis</title>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar se um novo cliente está sendo adicionado
        if (isset($_POST['adicionar_cliente'])) {
            // Obter os dados do formulário
            $nomeCliente = $_POST['nome_cliente'];
            $enderecoCliente = $_POST['endereco_cliente'];
            $telefoneCliente = $_POST['telefone_cliente'];
            $emailCliente = $_POST['email_cliente'];

            // Preparar a consulta SQL para inserir os dados
            $sql = "INSERT INTO cliente (nome_cliente, endereco_cliente, telefone_cliente, email_cliente) VALUES ('$nomeCliente', '$enderecoCliente', '$telefoneCliente', '$emailCliente')";

            if ($conn->query($sql) === TRUE) {
                echo "Cliente adicionado com sucesso.";
            } else {
                echo "Erro ao adicionar o cliente: " . $conn->error;
            }
        }

        // Verificar se um cliente existente está sendo atualizado
        if (isset($_POST['atualizar_cliente'])) {
            // Obter os dados do formulário
            $clienteID = $_POST['cliente_id'];
            $nomeCliente = $_POST['nome_cliente'];
            $enderecoCliente = $_POST['endereco_cliente'];
            $telefoneCliente = $_POST['telefone_cliente'];
            $emailCliente = $_POST['email_cliente'];

            // Preparar a consulta SQL para atualizar os dados
            $sql = "UPDATE cliente SET nome_cliente='$nomeCliente', endereco_cliente='$enderecoCliente', telefone_cliente='$telefoneCliente', email_cliente='$emailCliente' WHERE cliente_id=$clienteID";

            if ($conn->query($sql) === TRUE) {
                echo "Cliente alterado com sucesso.";
            } else {
                echo "Erro ao alterar o registro do cliente: " . $conn->error;
            }
        }
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
    ?>

    <h1>Meu Site</h1>

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
    <!-- Coloque o código específico para exibir a lista de clientes aqui -->

</body>
</html>