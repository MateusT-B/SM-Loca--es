<!DOCTYPE html>
<html class="h-100" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <script src="js/bootstrap.min.js"></script>
    <title>Registro de Usuário</title>
</head>
<body class="d-flex align-items-center justify-content-center py-4 bg-light bg-body-tertiary h-100"> 
    <!-- formulário de registro -->
    <main class="w-100 m-auto form-container">
        <form action="#" method="post">
            <img src="../img/logo.png" alt="logo" class="d-block mx-auto mb-4" height="150" width="150">
            <h2 class="text-center mb-4">Criar Conta</h2>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingNome" placeholder="Digite seu nome completo" required>
                <label for="floatingNome">Nome Completo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Digite seu e-mail" required>
                <label for="floatingEmail">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingSenha" placeholder="Digite sua senha" required>
                <label for="floatingSenha">Senha</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingConfirmaSenha" placeholder="Confirme sua senha" required>
                <label for="floatingConfirmaSenha">Confirmar Senha</label>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingCPF" placeholder="Digite seu CPF" pattern="\d{11}" maxlength="14" required oninput="formatCPF(this)">
                        <label for="floatingCPF">CPF</label>
                        <small class="form-text text-muted">Somente números, sem pontos ou traços.</small>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingTelefone" placeholder="Digite seu telefone" pattern="\d{10,11}" required oninput="formatTelefone(this)" maxlength="15">
                        <label for="floatingTelefone">Telefone</label>
                        <small class="form-text text-muted">Apenas números (10 ou 11 dígitos).</small>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="floatingDataNascimento" required>
                <label for="floatingDataNascimento">Data de Nascimento</label>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Registrar</button>
            <p class="mt-3 text-center">Já tem uma conta? <a href="../admin/login.php">Faça login aqui</a></p>
        </form>    
    </main>
    <!-- fim do formulário de registro -->
</body>

<script>
    function formatTelefone(input) {
        // Remove qualquer caractere que não seja número
        let value = input.value.replace(/\D/g, '');

        // Formata o telefone no padrão (XX) XXXXX-XXXX
        if (value.length <= 11) {
            value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
        }

        // Atualiza o campo com a formatação
        input.value = value;
    }


    function formatCPF(input) {
        // Remove qualquer caractere que não seja número
        let value = input.value.replace(/\D/g, '');
        
        // Formata o CPF: "XXX.XXX.XXX-XX"
        if (value.length <= 11) {
            value = value.replace(/^(\d{3})(\d{3})(\d{3})(\d{1,2})$/, '$1.$2.$3-$4');
        }
        
        // Atualiza o campo com a formatação
        input.value = value;
    }   
</script>
</html>
