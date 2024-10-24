<!DOCTYPE html>
<html class="h-100" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body class="d-flex align-items-center justify-content-center py-4 bg-light bg-body-tertiary h-100"> 
    <!-- formulário de login e senha -->
    <main class="w-100 m-auto form-container">
        <form action="login.php" method="post">
            <img src="img/logo.png" alt="logo" class="mx-5 mb-0" height="250" width="250">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="Digite seu e-mail:">
                <label for="floatingInput">E-mail</label>
            </div>
            <br>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" placeholder="Digite sua senha:">
                <label for="floatingInput">Senha</label>
            </div>
            <div class="form-check text-start my-3">
                <input type="checkbox" class="form-check-input">
                <label class="form-check-label" for="flexCheckDefault">Lembrar-me</label>
            </div>
            <input type="submit" value="Entrar" class="btn btn-primary w-100 py-2">
        </form>    
    </main>
    <!-- fim do formulário de login e senha -->
</body>
</html>
