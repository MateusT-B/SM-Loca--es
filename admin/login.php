<?php 
include '../banco/connect.php';

// inicia a verificação do login
if($_POST){
    $usuario  = $_POST['usuario'];
    $senha = md5($_POST['senha']);
    $emailRes = $conexao->query("select * from usuarios_clientes_web where usuario = '$usuario' and senha  = '$senha'");
    $rowEmail = $emailRes->fetch_assoc();
    $numRow  = $emailRes->num_rows;

    // se a sessão não existir
    if(!isset($_SESSION)){
        $sessaoAntiga = session_name('smlocacoesdb');
        session_start();
        $session_name_new = session_name();
    }
    if($numRow>0){
        $_SESSION['email_usuario'] = $email;
        $_SESSION['cpf_usuario'] = $rowemail['cpf'];
        $_SESSION['clinicanekodb'] = session_name();
        if($rowEmail['cpf']=='sup'){
            echo "<script>window.open('../../view_adm/index_adm.php?','_self')</script>";
        }
        else{
            echo "<script>window.open('login.php?=".$usuario."','_self')</script>";
        }
    }
    else{
       echo "<script>window.open('logout.php','_self')</script>";
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

