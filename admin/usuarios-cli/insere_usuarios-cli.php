<?php
include '../acesso_com.php';
include '../../banco/connect.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $cpf = preg_replace('/[.\-]/', '', $_POST['cpf']);
    $data_nascimento = $_POST['data_nascimento'];
    $data_cad = date('Y-m-d H:i:s'); // Data atual para cadastro

    $telefone = preg_replace('/[()\s-]/', '', $_POST['telefone']);
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
        header('Location: lista_usuarios-cli.php');
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
            <h2 class="breadcrumb-insere alert text-warning">
                <a href="lista_usuarios-cli.php">
                    <button class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserindo Cliente
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-warning" role="alert">
                    <form action="processa_cliente.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

                        <!-- Dados do Cliente -->
                        <label for="nome">Nome:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </span>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome do cliente" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <div class="input-group">
                            <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                                </div>
                        </div>
                        <!-- Máscara para o campo de CPF -->
                        <script>
                            $(document).ready(function() {
                                $('#cpf').mask('000.000.000-00');
                            });
                        </script>

                        <label for="data_nascimento">Data de Nascimento:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                </svg>
                            </span>
                            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
                        </div>

                        <!-- Telefone -->
                        <label for="telefone">Telefone:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                            </span>
                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite o telefone" required>
                        </div>
                        <!-- Adicione jQuery -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- Adicione o jQuery Mask Plugin -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                $('#telefone').mask('(00) 00000-0000');
                            });
                        </script>

                        <label for="tipo_telefone">Tipo de Telefone:</label>
                        <div class="input-group">
                            <select name="tipo_telefone" id="tipo_telefone" class="form-control" required>
                                <option value="Casa">Casa</option>
                                <option value="Celular">Celular</option>
                                <option value="Comercial">Comercial</option>
                            </select>
                        </div>
                        
                        <label for="telefone">Endereço:</label>

                        <label for="telefone">Logradouro:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </span>
                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite o telefone" required>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-warning">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-warning">
                Inserindo Endereço
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-warning" role="alert">
                    <form action="insere_usuario-cli.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

                        <label for="telefone">Logradouro:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </span>
                            <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Digite o telefone" required>
                        </div>
                        
                        <br>
                        <button type="submit" class="btn btn-warning">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
