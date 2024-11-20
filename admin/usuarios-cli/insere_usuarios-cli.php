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
    $cep = preg_replace('/[()\s-]/', '', $_POST['cep']);
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
                    <form action="lista_usuarios-cli.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

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
                                    <input type="text" class="form-control" id="cpf" name="cpf" maxlength="11" class="form-control" placeholder="Digite seu CPF" required>
                                </div>
                        </div>
                        <!-- Adicione jQuery -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- Adicione o jQuery Mask Plugin -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
                                <option value="Casa">RES</option>
                                <option value="Celular">CEL</option>
                                <option value="Comercial">COM</option>
                            </select>
                        </div>

                        <label for="email">Email:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                            </svg>
                            </span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite o email: " required>
                        </div>
                        
                        <label for="logradouro">Logradouro:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                            </svg>
                            </span>
                            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Digite o logradouro:" required>
                        </div>
                        
                        <label for="número">Número:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895"/>
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8.012 4.158c1.858 0 2.96-1.582 2.96-3.99V7.84c0-2.426-1.079-3.996-2.936-3.996-1.864 0-2.965 1.588-2.965 3.996v.328c0 2.42 1.09 3.99 2.941 3.99"/>
                                </svg>
                            </span>
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="número" id="número" class="form-control" placeholder="Digite o número:" maxlength="3" required>
                        </div>
                        
                        <label for="bairro">Bairro:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </span>
                            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Digite o bairro:" required>
                        </div>

                        <label for="cidade">Cidade:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
                            </svg>
                            </span>
                            <input type="text" name="cidade" id="cidade" class="form-control" placeholder="Digite o telefone:" required>
                        </div>

                        <label for="uf">Unidade federativa:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                            </svg>
                            </span>
                            <input type="text" name="uf" id="uf" class="form-control" placeholder="Digite o UF:" maxlength="2" required>
                        </div>

                        
                        <label for="cep">CEP:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                            <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                            </svg>
                            </span>
                            <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite o cep:" required>
                        </div>
                        <!-- Adicione jQuery -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- Adicione o jQuery Mask Plugin -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>     
                        <script>
                            $(document).ready(function() {
                                $('#cep').mask('00000-000');
                            });
                        </script>

                        <label for="tipo_endereco">Tipo de Endereço:</label>
                        <div class="input-group">
                            <select name="tipo_endereco" id="tipo_endereco" class="form-control" required>
                                <option value="Casa">RES</option>
                                <option value="Comercial">COM</option>
                            </select>
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
