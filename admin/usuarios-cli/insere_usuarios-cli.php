<?php
include '../acesso_com.php';
include '../../banco/connect.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $data_cad = date('Y-m-d H:i:s'); // Data atual para cadastro

    $telefone = $_POST['telefone'];
    $tipo_telefone = $_POST['tipo_telefone'];

    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = $_POST['cep'];
    $tipo_endereco = $_POST['tipo_endereco'];

    $email = $_POST['email'];

    // Inicia a transação
    mysqli_begin_transaction($conn);

    try {
        // Inserir na tabela `clientes`
        $insereCliente = "INSERT INTO clientes (nome, cpf, data_nascimento, data_cad)
                          VALUES ('$nome', '$cpf', '$data_nascimento', '$data_cad')";
        $resultadoCliente = $conn->query($insereCliente);

        if (!$resultadoCliente) {
            throw new Exception("Erro ao inserir cliente: " . $conn->error);
        }
        $id_cliente = mysqli_insert_id($conn); // Captura o ID do cliente

        // Inserir na tabela `telefones`
        $insereTelefone = "INSERT INTO telefones (telefone, tipo)
                           VALUES ('$telefone', '$tipo_telefone')";
        $resultadoTelefone = $conn->query($insereTelefone);

        if (!$resultadoTelefone) {
            throw new Exception("Erro ao inserir telefone: " . $conn->error);
        }
        $id_telefone = mysqli_insert_id($conn);

        // Relacionar cliente com telefone
        $insereClienteTelefone = "INSERT INTO clientes_telefones (id_cliente, id_telefone)
                                  VALUES ($id_cliente, $id_telefone)";
        $resultadoClienteTelefone = $conn->query($insereClienteTelefone);

        if (!$resultadoClienteTelefone) {
            throw new Exception("Erro ao relacionar cliente e telefone: " . $conn->error);
        }

        // Inserir na tabela `enderecos`
        $insereEndereco = "INSERT INTO enderecos (logradouro, numero, bairro, cidade, uf, cep, tipo)
                           VALUES ('$logradouro', $numero, '$bairro', '$cidade', '$uf', $cep, '$tipo_endereco')";
        $resultadoEndereco = $conn->query($insereEndereco);

        if (!$resultadoEndereco) {
            throw new Exception("Erro ao inserir endereço: " . $conn->error);
        }
        $id_endereco = mysqli_insert_id($conn);

        // Relacionar cliente com endereço
        $insereClienteEndereco = "INSERT INTO clientes_enderecos (id_cliente, id_endereco)
                                  VALUES ($id_cliente, $id_endereco)";
        $resultadoClienteEndereco = $conn->query($insereClienteEndereco);

        if (!$resultadoClienteEndereco) {
            throw new Exception("Erro ao relacionar cliente e endereço: " . $conn->error);
        }

        // Inserir na tabela `emails`
        $insereEmail = "INSERT INTO emails (email)
                        VALUES ('$email')";
        $resultadoEmail = $conn->query($insereEmail);

        if (!$resultadoEmail) {
            throw new Exception("Erro ao inserir email: " . $conn->error);
        }
        $id_email = mysqli_insert_id($conn);

        // Relacionar cliente com email
        $insereClienteEmail = "INSERT INTO clientes_emails (id_cliente, id_email)
                               VALUES ($id_cliente, $id_email)";
        $resultadoClienteEmail = $conn->query($insereClienteEmail);

        if (!$resultadoClienteEmail) {
            throw new Exception("Erro ao relacionar cliente e email: " . $conn->error);
        }

        // Confirma a transação
        mysqli_commit($conn);

        // Redireciona em caso de sucesso
        header('Location: sucesso.php');
    } catch (Exception $e) {
        // Reverter a transação em caso de erro
        mysqli_rollback($conn);
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <title>SMLocações - Inserir Cliente</title>
</head>
<body>
<?php include "../menu_adm_op.php";?>
<main class="container-inserir mx-auto">
    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-secondary">
                <a href="lista_clientes.php">
                    <button class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserir Cliente
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-secondary" role="alert">
                    <form action="processa_cliente.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

                        <!-- Dados do Cliente -->
                        <label for="nome">Nome:</label>
                        <div class="input-group-text">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 0a3 3 0 0 1 3 3 3 3 0 0 1-3 3 3 3 0 0 1-3-3 3 3 0 0 1 3-3zm0 1a2 2 0 1 0 0 4 2 2 0 0 0 0-4zM1 12a7 7 0 0 1 7-7 7 7 0 0 1 7 7v1h-2v-1a5 5 0 0 0-10 0v1H1v-1z"/>
                                </svg>
                            </span>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome do cliente" required>
                        </div>

                        <label for="cpf">CPF:</label>
                        <div class="input-group-text">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4 1h8a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                </svg>
                            </span>
                            <input type="text" name="cpf" id="cpf" class="form-control" placeholder="Digite o CPF" required>
                        </div>

                        <label for="data_nascimento">Data de Nascimento:</label>
                        <div class="input-group-text">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                    <path d="M3 0a1 1 0 0 1 1 1v1h8V1a1 1 0 0 1 2 0v1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h1V1a1 1 0 0 1 1-1zM2 4v12h12V4H2z"/>
                                </svg>
                            </span>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
                        </div>

                        <!-- Telefone -->
                        <label for="telefone">Telefone:</label>
                        <div class="input-group-text">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M1.885 1.56A1.62 1.62 0 0 1 2.698 1h10.604a1.62 1.62 0 0 1 1.558 1.56l.097 11.78a1.62 1.62 0 0 1-1.56 1.558l-2.6-.207a1.62 1.62 0 0 1-1.554-1.48v-1.3a.62.62 0 0 0-.62-.62h-5.6a.62.62 0 0 0-.62.62v1.3a1.62 1.62 0 0 1-1.554 1.48l-2.6.207a1.62 1.62 0 0 1-1.56-1.558l.097-11.78z"/>
                                </svg>
                            </span>
                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite o telefone" required>
                        </div>

                        <label for="tipo_telefone">Tipo de Telefone:</label>
                        <div class="input-group-text">
                            <select name="tipo_telefone" id="tipo_telefone" class="form-control" required>
                                <option value="Casa">Casa</option>
                                <option value="Celular">Celular</option>
                                <option value="Comercial">Comercial</option>
                            </select>
                        </div>

                        <!-- Nível do Funcionário -->
                        <label for="nivel_funcionario">Nível do Funcionário:</label>
                        <div class="input-group-text">
                            <select name="nivel_funcionario" id="nivel_funcionario" class="form-control" required>
                            <?php do{ ?>
                                    <option value="<?php echo $rowTipo['id']; ?>">
                                    <?php echo $rowTipo['niveis']; ?>
                                    </option>
                                <?php }while($rowTipo = $listaTipo->fetch_assoc()); ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
