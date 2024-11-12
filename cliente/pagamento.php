<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <script src="../js/bootstrap.min.js"></script>
    <title>forma de pagamento</title>
</head>
<body>
<?php include ("menu_cliente.php") ?>
<div class="payment-container">
    <h2>Forma De Pagamento</h2>
    
    <form id="payment-form" action="/processa-pagamento" method="POST">
        <!-- Nome do Cartão -->
        <div class="input-group">
            <label for="card-name">Nome no Cartão</label>
            <input type="text" id="card-name" name="card-name" placeholder="Nome completo" required>
        </div>

        <!-- Número do Cartão -->
        <div class="input-group">
            <label for="card-number">Número do Cartão</label>
            <input type="text" id="card-number" name="card-number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" pattern="\d{4} \d{4} \d{4} \d{4}" required>
        </div>


        <!-- Data de Validade -->
        <div class="input-group">
            <label for="expiry-date">Data de Validade</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AAAA" pattern="\d{2}/\d{4}" required>
        </div>

        <!-- CVV -->
        <div class="input-group">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="XXX" maxlength="3" pattern="\d{3}" required>
        </div>


        <!-- Botão de pagamento -->
        <button type="submit" class="payment-button">Pagar Agora</button>
    </form>
    <script>
     //js para aceitar apenas numero e a quantidade correta de um numero de cartao 
       document.getElementById('card-number').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
        if (value.length <= 16) {
            value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Adiciona espaço a cada 4 dígitos
        }
        e.target.value = value;
    });
    
    //js para deixar a data do cartao Remove tudo que não for número 
    document.getElementById('expiry-date').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length >= 3) {
            value = value.slice(0, 2) + '/' + value.slice(2, 6);
        }
        e.target.value = value;
    });
    
    //js para deixar cvv Garante que só serão aceitos 3 dígitos e que Remova tudo que não for número
    document.getElementById('cvv').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length > 3) {
            value = value.slice(0, 3); 
        }
        e.target.value = value;
    });
</script>

    <div class="form-endereco">
    
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
          <option>RES</option>
          <option>COM</option>
        </select>
      </div>  
    </div>
    </div>
</div>

<br>
<?php include ("rodape.php") ?>

</body>
</html>
