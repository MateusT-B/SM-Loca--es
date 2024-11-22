<?php
include '../acesso_com.php'; // Verifica acesso
include '../../banco/connect.php'; // Conecta ao banco de dados


session_start();

// Verifica se o id_cliente está na sessão
if (!isset($_SESSION['id_funcionario']) || empty($_SESSION['id_funcionario'])) {
    die("Erro: ID do cliente não encontrado.");
}

$idFuncionario = $_SESSION['id_funcionario']; // Pega o id_cliente da sessão

if ($_POST) {
    // Obtendo os dados enviados pelo formulário
    $idnivel = $_POST['id_nivel'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $ativo = $_POST['ativo'];

    // Inserindo dados na tabela `usuarios`
    $stmtUsuario = $conn->prepare("INSERT INTO usuarios_funcionarios_web (id_funcionario, id_nivel, usuario, senha, ativo) VALUES (?, ?, ?, MD5(?), ?)");
    $stmtUsuario->bind_param('iisss', $idFuncionario, $idnivel, $usuario, $senha, $ativo);
    $resultadoUsuario = $stmtUsuario->execute();

    if ($resultadoUsuario) {
        header('Location: lista_usuarios-fun.php'); // Redireciona para a lista de usuários
        exit;
    } else {
        echo "Erro ao inserir usuário: " . $conn->error;
    }
}
$listaTipo = $conn->query("select * from niveis order by cargo");
$rowTipo = $listaTipo->fetch_assoc();
$numLinhas = $listaTipo->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="shortcut icon" href="../../img/favicon1.png" type="image/png">
    <title>SMLocações - Inserir User</title>
</head>
<body>
<?php include "../menu_adm_op.php";?>
<main class="container-inserir mx-auto">
    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6 col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-secondary">
                <a href="lista_user.php">
                    <button class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserindo User
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-secondary" role="alert">
                    <form action="insere_user.php" method="post" name="form_insere" enctype="multipart/form-data" id="form_insere">

                        <!-- Dados do Cliente -->
                        <label for="usuario">Usuário:</label>
                        <div class="input-group">
                        <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </span>
                            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Digite o usuario: " required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <div class="input-group">
                            <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </span>
                                    <input type="password" class="form-control" id="senha" name="senha" maxlength="11" class="form-control" placeholder="Digite sua senha: " required>
                                </div>
                        </div>

                        <label for="id_nivel">Nivel:</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                                </svg>
                            </span>
                            <select name="id_nivel" id="id_nivel" class="form-control" required>
                                <?php do{ ?>
                                    <option value="<?php echo $rowTipo['id']; ?>">
                                    <?php echo $rowTipo['cargo']; ?>
                                    </option>
                                <?php }while($rowTipo = $listaTipo->fetch_assoc()); ?>
                            </select>
                        </div>

                        <label for="ativo">Ativo:</label>
                        <div class="input-group-text">
                        <span class="input-group-addon">
                            <label for="ativo_s" class="radio-inline">
                                <input type="radio" name="ativo" id="ativo" value="Sim">Sim
                            </label>
                            <label for="ativo_s" class="radio-inline">
                                <input type="radio" name="ativo" id="ativo" value="Nao" checked>Não
                            </label>
                        </div>

                        <br>
                        <button href="insere_contatos.php" type="submit" class="btn btn-secondary">Avançar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>


