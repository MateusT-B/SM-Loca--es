<?php
include '../banco/connect.php';
session_start(); // Inicia a sessão

// if ($_POST) {
//     $login = $_POST['login'];
//     $senha = md5($_POST['senha']); // Usa md5 para criptografar a senha
//     $loginRes = $conn->query("SELECT * FROM usuarios_web WHERE login = '$login' AND senha = '$senha'");
//     $rowLogin = $loginRes->fetch_assoc();
//     $numRow = $loginRes->num_rows;

//     // Verifica se o login foi bem-sucedido
//     if ($numRow > 0) {
//         $_SESSION['login_usuario'] = $login;
//         $_SESSION['nivel_usuario'] = $rowLogin['nivel'];
        
//         // Redireciona de acordo com o nível do usuário
//         if ($rowLogin['nivel'] == 'ger') {
//             header('Location: ..index.php'); // Redireciona para index
//             exit();
//         } else {
//             header('Location: ../index.php?cliente=' . urlencode($login)); // Redireciona para Cliente
//             exit();
//         }
//     } else {
//         // Se o login falhar, você pode adicionar uma mensagem de erro aqui
//         $erro = "Usuário ou senha inválidos.";
//     }
// }

if ($_POST) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Simulação de credenciais fixas
    $usuarioCorreto = "admin";
    $senhaCorreta = "senha123"; // Substitua por uma senha fictícia

    // Verifica se as credenciais estão corretas
    if ($login === $usuarioCorreto && $senha === $senhaCorreta) {
        $_SESSION['login_usuario'] = $login;
        $_SESSION['nivel_usuario'] = 'ger'; // Definindo nível como 'ger' para o exemplo
        
        // Redireciona para a área administrativa
        header('Location: index.php');
        exit();
    } else {
        // Mensagem de erro
        $erro = "Usuário ou senha inválidos.";
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
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            <div class="form-floating mb-3">
                <input type="text" name="login" id="login" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">
                <label for="login">Usuário</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="senha" class="form-control" id="floatingSenha" placeholder="Digite sua senha:" required>
                <label for="floatingSenha">Senha</label>
            </div>
            <div class="form-check text-start mb-3">
                <input type="checkbox" class="form-check-input" id="lembrarMe">
                <label class="form-check-label" for="lembrarMe">Lembrar-me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Entrar</button>
            <p class="mt-3 text-center">Ainda não tem uma conta? <a href="../cliente/registro.php">Crie uma aqui</a></p>
        </form>    
    </main>
</body>
</html>

