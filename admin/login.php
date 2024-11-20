    <?php
    // Inclui a conexão com o banco de dados
    include '../banco/connect.php';

    // Variável de erro, caso o login falhe
    $erro = '';

    // Inicia a verificação do login, se o formulário foi enviado via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica se os dados de usuário e senha foram enviados
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            // Obtém os dados do formulário
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            // Criptografa a senha utilizando MD5
            $senhaMD5 = md5($senha);

            // Prepara a consulta no banco
            $stmt = $conn->prepare("SELECT * FROM usuarios_clientes_web WHERE usuario = ? AND senha = ?");
            $stmt->bind_param("ss", $usuario, $senhaMD5); // Passa a senha criptografada com MD5
            $stmt->execute();
            $result = $stmt->get_result();
            $rowEmail = $result->fetch_assoc();
            $numRow = $result->num_rows;

            // Verifica se o usuário existe e a senha está correta
            if ($numRow > 0) {
                // Se a senha estiver correta, cria a sessão
                session_start(); // Inicia a sessão

                // Armazena os dados do usuário na sessão
                $_SESSION['usuario_usuario'] = $rowEmail['usuario'];
                $_SESSION['id_cliente_usuario'] = $rowEmail['id_cliente'];
                $_SESSION['clinicanekodb'] = session_name();

                // Redireciona conforme o perfil do usuário
                if ($rowEmail['id_cliente'] == 'sup') {
                    // Usuário de perfil 
                    echo "<script>window.open('../../view_adm/index_adm.php', '_self')</script>";
                } else {
                    // Usuário normal
                    echo "<script>window.open('../cliente/index.php', '_self')</script>";
                }
            } else {
                // Se o usuário não for encontrado ou a senha estiver incorreta
                $erro = 'Usuário ou senha incorretos!';
            }

            // Fecha a declaração e a conexão
            $stmt->close();
            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html class="h-100" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body class="d-flex align-items-center justify-content-center py-4 bg-light bg-body-tertiary h-100"> 
    <main class="w-100 m-auto form-container">
        <form action="login.php" name="form_login" id="form_login" method="POST">
            <img src="../img/logo.png" alt="logo" class="d-block mx-auto mb-4" height="150" width="150">
            <h2 class="text-center mb-4">Login</h2>
            
            <!-- Exibe o erro caso o login falhe -->
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $erro ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <!-- Campo de entrada para o nome de usuário -->
                <input type="text" name="usuario" id="usuario" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                <label for="usuario">Usuário</label>
            </div>

            <div class="form-floating mb-3">
                <!-- Campo de entrada para a senha -->
                <input type="password" name="senha" class="form-control" id="floatingSenha" placeholder="Digite sua senha:" required>
                <label for="floatingSenha">Senha</label>
            </div>

            <div class="form-check text-start mb-3">
                <input type="checkbox" class="form-check-input" id="lembrarMe">
                <label class="form-check-label" for="lembrarMe">Lembrar-me</label>
            </div>

            <!-- Botão de envio -->
            <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
            <p class="mt-3 text-center">Ainda não tem uma conta? <a href="../cliente/registro.php">Crie uma aqui</a></p>
        </form>    
    </main>
</body>
</html>
