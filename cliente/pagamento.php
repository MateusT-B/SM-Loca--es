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
    <div id="form-container">
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
            <form id="endereco-form" action="/processa-endereco" method="POST">
                <div class="input-group">
                    <label for="Rua">Rua</label>
                    <input type="text" id="Rua" name="Rua" placeholder="Rua" required>
                </div>
                <div class="input-group">
                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" placeholder="número da casa/apartamento" required>
                </div>
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" placeholder="bairro" required>
                </div>
                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="cidade" required>
                </div>
                <div class="input-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" placeholder="XXXXX-XXX"  required>
                </div>
                <div class="input-group">
                    <label for="estado">Estado</label>
                        <select id="estado" name="estado" required>
                        <option value="" disabled selected>Selecione o estado</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                 </select>
            </div>
         <div class="input-group">
                    <label for="tipo_endereco">Tipo de Endereço</label>
                    <select class="" name="tipo_endereco" required>
                        <option value="" disabled selected>Selecione o tipo de endereço</option>
                        <option value="RES">Residencial</option>
                        <option value="COM">Comercial</option>
                    </select>
             

                <button type="submit" class="endereco-button">Salvar Endereço</button>
                </div>

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
    
    //js para deixar cvv Garantindo que só serão aceitos 3 dígitos e que Remova tudo que não for número
    document.getElementById('cvv').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length > 3) {
            value = value.slice(0, 3); 
        }
        e.target.value = value;
    });
    //js para deixar cvv Garantindo que só serão aceitos 8 dígitos e que Remova tudo que não for número
    document.getElementById('cep').addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); 
        if (value.length >= 8) {
            value = value.slice(0, 5)+'-' + value.slice(5, 8);
        }
        e.target.value = value;
    });
</script>
    <br>
    <?php include("rodape.php") ?>
</body>
</html>
