<?php
include '../acesso_com.php';
include '../../banco/connect.php';

error_reporting(0); // Desativa a exibição de erros

session_start();

// Verifica se o id_cliente está na sessão
if (!isset($_SESSION['id_cliente']) || empty($_SESSION['id_cliente'])) {
    die("Erro: ID do cliente não encontrado.");
}

$idCliente = $_SESSION['id_cliente']; // Pega o id_cliente da sessão

if ($_POST) {
    // Dados do formulário de contatos
    $telefone = preg_replace('/[()\s-]/', '', $_POST['telefone']);
    $tipo = $_POST['tipo'];
    $email = $_POST['email'];

    // 1. Insere na tabela `telefones` se o telefone foi fornecido
    if ($telefone) {
        $stmtTelefone = $conn->prepare("INSERT INTO telefones (telefone, tipo) VALUES (?, ?)");
        $stmtTelefone->bind_param('ss', $telefone, $tipo);
        $resultadoTelefone = $stmtTelefone->execute();


        if ($resultadoTelefone) {
            // 2. Captura o id do telefone recém inserido
            $idTelefone = $conn->insert_id;
        } else {
            echo "Erro ao inserir telefone: " . $conn->error;
            exit;
        }
    }

    // 3. Insere na tabela `emails` se o email foi fornecido
    if ($email) {
        $stmtEmail = $conn->prepare("INSERT INTO emails (email) VALUES (?)");
        $stmtEmail->bind_param('s', $email);
        $resultadoEmail = $stmtEmail->execute();

        if ($resultadoEmail) {
            // 4. Captura o id do email recém inserido
            $idEmail = $conn->insert_id;
        } else {
            echo "Erro ao inserir email: " . $conn->error;
            exit;
        }
    }

    // 5. Associar os contatos ao cliente na tabela `clientes_contatos`
    if (isset($idTelefone)) {
        $stmtClienteContatoTelefone = $conn->prepare("INSERT INTO clientes_telefones (id_cliente, id_telefone) VALUES (?, ?)");
        $stmtClienteContatoTelefone->bind_param('ii', $idCliente, $idTelefone);
        $resultadoClienteContatoTelefone = $stmtClienteContatoTelefone->execute();
        if (!$resultadoClienteContatoTelefone) {
            echo "Erro ao associar telefone ao cliente: " . $conn->error;
            exit;
        }
    }

    if (isset($idEmail)) {
        $stmtClienteContatoEmail = $conn->prepare("INSERT INTO clientes_emails (id_cliente, id_email) VALUES (?, ?)");
        $stmtClienteContatoEmail->bind_param('ii', $idCliente, $idEmail);
        $resultadoClienteContatoEmail = $stmtClienteContatoEmail->execute();
        if (!$resultadoClienteContatoEmail) {
            echo "Erro ao associar email ao cliente: " . $conn->error;
            exit;
        }
    }

    // 6. Redireciona para a página de sucesso ou próxima etapa
    header('Location: insere_user.php?id_cliente=' . $idCliente);
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="shortcut icon" href="../../img/favicon1.png" type="image/png">
    <title>SMLocações - Inserir Cliente</title>
</head>
<body>
<?php include "../menu_adm_op.php";?>
<main class="container-inserir mx-auto">
    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-warning">
                <a href="insere_contatos.php">
                    <button class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserindo Contato
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-warning" role="alert">
                    <form action="insere_contatos.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

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

                        <label for="tipo">Tipo de Telefone:</label>
                        <div class="input-group">
                            <select name="tipo" id="tipo" class="form-control" required>
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

                        <br>
                        <button type="submit" class="btn btn-warning">Avançar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>

