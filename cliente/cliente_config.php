<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/x-icon">
    <title>Atualizar dados</title>
</head> 
<body>
<!-- inclusão do cabeçalho do cliente --> 
<?php include ("menu_cliente.php") ?>

<br>

<form action="/salvar-dados" method="POST">
  <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f8f9fa;">
    <div class="row w-100 p-4" style="background-color: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 900px;">
        
      <!-- Seção de Meus Dados Pessoais -->
      <div class="col-12 mb-4">
        <h1 class="text-center">Meus Dados Pessoais</h1>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="nomeCompleto" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeCompleto">
          </div>

        <div class="col-md-4 mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" maxlength="14">
        </div>

        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email">
          </div>

          <div class="col-md-3 mb-3"> 
            <label for="dataNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="dataNascimento">
          </div>
        </div>

        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" maxlength="15">
        </div>

        </div>
      </div>

      <!-- Seção de Endereço -->
      <div class="col-12 mb-4">
        <h1 class="text-center">Endereço</h1>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="logradouro" class="form-label">Logradouro</label>
            <input type="text" class="form-control" id="logradouro">
          </div>

          <div class="col-md-2 mb-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" class="form-control" id="numero">
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" class="form-control" id="bairro">
          </div>

          <div class="col-md-4 mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade">
          </div>
        </div>

        <div class="row">
          <div class="col-md-1 mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado">
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

          <div class="col-md-3 mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" maxlength="10">
          </div>


        </div>

        <div class="row">
          <div class="col-md-2 mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-control" id="tipo">
              <option>RES</option>
              <option>COM</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Botões -->
      <div class="col-12 d-flex justify-content-between mt-3">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <button type="reset" class="btn btn-secondary">Cancelar</button>
      </div>
    </div>
  </div>
</form>

<br>

<?php include ("rodape.php") ?>
</body>

<script>
  document.getElementById('telefone').addEventListener('input', function(event) {
    let input = event.target.value;

    // Remove tudo o que não for número
    input = input.replace(/\D/g, '');

    // Formata para (XX) XXXXX-XXXX
    if (input.length <= 2) {
        input = `(${input}`;
    } else if (input.length <= 6) {
        input = `(${input.slice(0, 2)}) ${input.slice(2)}`;
    } else if (input.length <= 10) {
        input = `(${input.slice(0, 2)}) ${input.slice(2, 7)}-${input.slice(7)}`;
    } else {
        input = `(${input.slice(0, 2)}) ${input.slice(2, 7)}-${input.slice(7, 11)}`;
    }

    event.target.value = input;
});

document.getElementById('cep').addEventListener('input', function(event) {
    let input = event.target.value;

    // Remove tudo o que não for número
    input = input.replace(/\D/g, '');

    // Formata para XXXXX-XXX
    if (input.length <= 5) {
        input = input.slice(0, 5);
    } else {
        input = input.slice(0, 5) + '-' + input.slice(5, 8);
    }

    event.target.value = input;
});

document.getElementById('cpf').addEventListener('input', function(event) {
    let input = event.target.value;

    // Remove tudo o que não for número
    input = input.replace(/\D/g, '');

    // Formata o CPF para XXX.XXX.XXX-XX
    if (input.length <= 3) {
        input = input.slice(0, 3);
    } else if (input.length <= 6) {
        input = input.slice(0, 3) + '.' + input.slice(3, 6);
    } else if (input.length <= 9) {
        input = input.slice(0, 3) + '.' + input.slice(3, 6) + '.' + input.slice(6, 9);
    } else {
        input = input.slice(0, 3) + '.' + input.slice(3, 6) + '.' + input.slice(6, 9) + '-' + input.slice(9, 11);
    }

    event.target.value = input;
});


</script>

</html>
