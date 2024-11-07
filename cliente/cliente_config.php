<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/x-icon">
    <title>Dados pessoais</title>
</head> 
<body>
<!-- inclusão do cabeçalho do cliente --> 
<?php include ("menu_cliente.php") ?>

<form action="/salvar-dados" method="POST">
  <div class="container">
    <br>
    <h2>Meus Dados Pessoais</h2>
    
    <!-- Nome Completo -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="nomeCompleto" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nomeCompleto">
      </div>
    </div>
    
    <!-- E-mail -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" >
      </div>
    </div>
    
    <!-- Data de Nascimento -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="dataNascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="dataNascimento" >
      </div>
    </div>

    <!-- Telefone -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" id="telefone" >
      </div>
    </div>
    
    <!-- Botões -->
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      <button type="reset" class="btn btn-secondary">Cancelar</button>
    </div>
    <br>
  </div>
</form>


<?php include ("../rodape.php") ?>
</body>

</html>