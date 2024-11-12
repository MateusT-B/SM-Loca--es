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
    <title>Forma de Pagamento</title>
</head>
<body>
    <?php include("menu_cliente.php") ?>

    <!-- Contêiner Flexível para os Formulários -->
    <div class="form-container">
        <!-- Formulário de Pagamento -->
        <div class="payment-container">
            <h2>Forma De Pagamento</h2>
            <form id="payment-form" action="/processa-pagamento" method="POST">
                <div class="input-group">
                    <label for="card-name">Nome no Cartão</label>
                    <input type="text" id="card-name" name="card-name" placeholder="Nome completo" required>
                </div>
                <div class="input-group">
                    <label for="card-number">Número do Cartão</label>
                    <input type="text" id="card-number" name="card-number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" pattern="\d{4} \d{4} \d{4} \d{4}" required>
                </div>
                <div class="input-group">
                    <label for="expiry-date">Data de Validade</label>
                    <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/AAAA" pattern="\d{2}/\d{4}" required>
                </div>
                <div class="input-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="XXX" maxlength="3" pattern="\d{3}" required>
                </div>
                <button type="submit" class="payment-button">Pagar Agora</button>
            </form>
        </div>

        <!-- Formulário de Endereço -->
        <div class="endereco-entrega">
            <h2>Endereço de Entrega</h2>
            <form id="address-form" action="/processa-endereco" method="POST">
                <div class="input-group">
                    <label for="address-name">Nome do Destinatário</label>
                    <input type="text" id="address-name" name="address-name" placeholder="Nome completo" required>
                </div>
                <div class="input-group">
                    <label for="address">Endereço</label>
                    <input type="text" id="address" name="address" placeholder="Rua, número, complemento" required>
                </div>
                <div class="input-group">
                    <label for="city">Cidade</label>
                    <input type="text" id="city" name="city" placeholder="Cidade" required>
                </div>
                <div class="input-group">
                    <label for="state">Estado</label>
                    <input type="text" id="state" name="state" placeholder="Estado" required>
                </div>
                <div class="input-group">
                    <label for="zip">CEP</label>
                    <input type="text" id="zip" name="zip" placeholder="XXXXX-XXX" pattern="\d{5}-\d{3}" required>
                </div>
                <button type="submit" class="address-button">Salvar Endereço</button>
            </form>
        </div>
    </div>
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
    <br>
    <?php include("rodape.php") ?>
</body>
</html>
