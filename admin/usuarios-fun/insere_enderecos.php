
<?php
include '../acesso_com.php';
include '../../banco/connect.php';

error_reporting(0); // Desativa a exibição de erros

session_start();

// Verifica se o id_cliente está na sessão
if (!isset($_SESSION['id_funcionario']) || empty($_SESSION['id_funcionario'])) {
die("Erro: ID do Funcionario não encontrado.");
}

$idFuncionario = $_SESSION['id_funcionario']; // Pega o idFuncionario da sessão

if ($_POST) {
    // Dados do formulário de endereço
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $cep = preg_replace('/[()\s-]/', '', $_POST['cep']);
    $tipo_endereco = $_POST['tipo'];

    // 1. Insere na tabela `enderecos`
    $stmtEndereco = $conn->prepare("INSERT INTO enderecos (logradouro, numero, bairro, cidade, uf, cep, tipo) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmtEndereco->bind_param('sisssss', $logradouro, $numero, $bairro, $cidade, $uf, $cep, $tipo_endereco);
    $resultadoEndereco = $stmtEndereco->execute();
    // utilizando os statements para passagem de parametro

    if ($resultadoEndereco) {
        // 2. Captura o id do endereço recém inserido
        $idEndereco = $conn->insert_id;

        // 3. Associa o endereço ao cliente na tabela `clientes_enderecos`
        $stmtFuncionarioEndereco = $conn->prepare("INSERT INTO funcionarios_enderecos (id_funcionario, id_endereco) VALUES (?, ?)");
        $stmtFuncionarioEndereco->bind_param('ii', $idFuncionario, $idEndereco);
        $resultadoFuncionarioEndereco = $stmtFuncionarioEndereco->execute();

        if ($resultadoFuncionarioEndereco) {
            // 4. Redireciona para a próxima página ou mostra uma mensagem de sucesso
            header('Location: insere_contatos.php?id_funcionario=' . $idFuncionario);
            exit;
        } else {
            echo "Erro ao associar endereço ao Funcionario: " . $conn->error;
            exit;
        }
    } else {
        echo "Erro ao inserir endereço: " . $conn->error;
        exit;
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
    <link rel="shortcut icon" href="../../img/favicon1.png" type="image/png">
    <title>SMLocações - Inserir Funcionario</title>
</head>
<body>
<?php include "../menu_adm_op.php";?>
<main class="container-inserir mx-auto">
    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-secondary">
                <a href="lista_usuarios-cli.php">
                    <button class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserindo Endereço
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-secondary" role="alert">
                    <form action="insere_enderecos.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">
                        
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
                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="numero" id="numero" class="form-control" placeholder="Digite o número:" maxlength="3" required>
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

                        <label for="tipo">Tipo de Endereço:</label>
                        <div class="input-group">
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="RES">Residencial</option>
                                <option value="COM">Comercial</option>
                            </select>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-secondary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>