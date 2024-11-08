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
    <!-- Titulo meus dados pessoais -->
    <h1>Meus Dados Pessoais</h1>
    
    <!-- Nome Completo -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="nomeCompleto" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nomeCompleto">
      </div>
    </div>

    <!-- Nome Completo -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="cpf" class="form-label">CPF</label>
        <input type="number" class="form-control" id="cpf">
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

    <br>
    <!-- Titulo H1 de endereço -->
     <h1>Endereço</h1>

    <!-- Logradouro -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="logradouro" class="form-label">Logradouro</label>
        <input type="text" class="form-control" id="logradouro" >
      </div>  
    </div>

    <!-- Número -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="numero" class="form-label">Número</label>
        <input type="number" class="form-control" id="numero" >
      </div>  
    </div>

    <!-- Bairro -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="bairro" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="bairro" >
      </div>  
    </div>

    <!-- Cidade -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" >
      </div>  
    </div>

    <!-- Estado -->
    <div class="row mb-3">
      <div class="col-md-6">
      <label for="estado" class="form-label">Estado</label>
        <select class="form-control">
          <option>AC</option>
          <option>AL</option>
          <option>AP</option>
          <option>AM</option>
          <option>BA</option>
          <option>CE</option>
          <option>DF</option>
          <option>ES</option>
          <option>GO</option>
          <option>MA</option>
          <option>MT</option>
          <option>MS</option>
          <option>MG</option>
          <option>PA</option>
          <option>PB</option>
          <option>PR</option>
          <option>PE</option>
          <option>PI</option>
          <option>RJ</option>
          <option>RN</option>
          <option>RS</option>
          <option>RO</option>
          <option>RR</option>
          <option>SC</option>
          <option>SP</option>
          <option>SE</option>
          <option>TO</option>
        </select>
      </div>  
    </div>

    <!-- CEP -->
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="cep" class="form-label">CEP</label>
        <input type="number" class="form-control" id="cep" >
      </div>  
    </div>

    
    <!-- Tipo -->
    <div class="row mb-3">
      <div class="col-md-6">
      <label for="tipo" class="form-label">Tipo</label>
        <select class="form-control">
          <option></option>
        </select>
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



<?php include ("rodape.php") ?>
</body>

</html>