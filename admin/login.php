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

        // Criptografa a senha utilizando MD5 (considere usar password_hash no futuro)
        $senhaMD5 = md5($senha);

        // Primeiro, tentamos autenticar como cliente
        $stmt_cliente = $conn->prepare("SELECT * FROM usuarios_clientes_web WHERE usuario = ? AND senha = ?");
        $stmt_cliente->bind_param("ss", $usuario, $senhaMD5);
        $stmt_cliente->execute();
        $result_cliente = $stmt_cliente->get_result();
        $numRow_cliente = $result_cliente->num_rows;

        // Se o cliente for encontrado
        if ($numRow_cliente > 0) {
            $row_cliente = $result_cliente->fetch_assoc();
            session_start(); // Inicia a sessão

            // Armazena os dados do cliente na sessão
            $_SESSION['usuario_usuario'] = $row_cliente['usuario'];
            $_SESSION['id_cliente_usuario'] = $row_cliente['id_cliente'];
            $_SESSION['clinicanekodb'] = session_name();

            // Redireciona para a página do cliente
            echo "<script>window.open('../cliente/index.php', '_self')</script>";

        } else {
            // Agora, tentamos autenticar como funcionário
            $stmt_funcionario = $conn->prepare("SELECT * FROM usuarios_funcionarios_web WHERE usuario = ? AND senha = ?");
            $stmt_funcionario->bind_param("ss", $usuario, $senhaMD5);
            $stmt_funcionario->execute();
            $result_funcionario = $stmt_funcionario->get_result();
            $numRow_funcionario = $result_funcionario->num_rows;

            // Se o funcionário for encontrado
            if ($numRow_funcionario > 0) {
                $row_funcionario = $result_funcionario->fetch_assoc();
                session_start(); // Inicia a sessão

                // Armazena os dados do funcionário na sessão
                $_SESSION['usuario_funcionario'] = $row_funcionario['usuario'];
                $_SESSION['id_funcionario_usuario'] = $row_funcionario['id_funcionario'];
                $_SESSION['id_nivel_usuario'] = $row_funcionario['id_nivel'];
                $_SESSION['clinicanekodb'] = session_name();

                // Redireciona para a página do administrador ou painel do funcionário
                echo "<script>window.open('../admin/index.php', '_self')</script>";
            } else {
                // Se não for encontrado nem cliente nem funcionário
                $erro = 'Usuário ou senha incorretos!';
            }
        }

        // Fecha a declaração e a conexão
        $stmt_cliente->close();
        $stmt_funcionario->close();
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
