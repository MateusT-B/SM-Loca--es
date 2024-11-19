<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
</head>
<body>

<!--- inclusão do cabeçalho ---> 
<?php include ("menu_cliente.php")?>

<br>

<!-- Titulo do carrinho de compras com o ícone -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Seu carrinho</h1>     
        </div>
    </div>
</div>

<br>

<!-- Div branca com todos os conteúdos -->
<div class="container" style="background-color: white; padding: 20px; border-radius: 5px;">

    <!-- Tabela com itens no carrinho -->
    <div class="row">
        <!-- Descrição -->
        <div class="col">
            <h3>Descrição</h3>
        </div>
        <!-- Quantidade -->
        <div class="col">
            <h3>Qntd.</h3>
        </div>
        <!-- Preço -->
        <div class="col">
            <h3>Preço</h3>
        </div>
        <!-- Subtotal -->
        <div class="col">
            <h3>Subtotal</h3>
        </div>
    </div>

    <!-- Produto 1 -->
    <div class="row">
        <div class="col">
            <p>Produto A</p>
        </div>
        <div class="col">
            <!-- Botões de quantidade -->
            <button class="btn btn-outline-secondary" onclick="alterarQuantidade(-1, 1)">-</button>
            <span id="qtdProduto1">1</span>
            <button class="btn btn-outline-secondary" onclick="alterarQuantidade(1, 1)">+</button>
        </div>
        <div class="col">
            <p id="precoProduto1">R$ 50,00</p>
        </div>
        <div class="col">
            <p id="subtotalProduto1">R$ 50,00</p>
        </div>
    </div>

    <br>

    <!-- Total geral -->
    <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col">
            <h3>Total</h3>
        </div>
        <div class="col">
            <p id="totalGeral">R$ 110,00</p>
        </div>
    </div>

    <br>

    <!-- Botões de ação -->
    <div class="row">
        <div class="col">
            <a href="../produtos.php">
                <button class="btn btn-primary">Continuar Comprando</button> 
            </a>
        </div>
        <div class="col">
            <a href="pagamento.php">
                <button class="btn btn-secondary">Finalizar Compra</button>
            </a>
        </div>
    </div>
</div>

<br>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>

</body>

<script>
    // Função para alterar a quantidade e recalcular o subtotal e total
    function alterarQuantidade(quantidadeAlterada, produtoId) {
        // Atualiza a quantidade do produto com base no produtoId
        let qtdProduto = document.getElementById('qtdProduto' + produtoId);
        let novoQtdProduto = parseInt(qtdProduto.innerText) + quantidadeAlterada;

        // Evita valores negativos
        if (novoQtdProduto < 0) novoQtdProduto = 0;

        qtdProduto.innerText = novoQtdProduto;

        // Obtém o preço do produto e recalcula o subtotal
        let precoProduto = parseFloat(document.getElementById('precoProduto' + produtoId).innerText.replace('R$', '').trim());
        recalcularSubtotal(produtoId, precoProduto, novoQtdProduto);
    }

    // Função para recalcular o subtotal
    function recalcularSubtotal(produtoId, precoUnitario, quantidade) {
        let subtotal = precoUnitario * quantidade;
        document.getElementById('subtotalProduto' + produtoId).innerText = `R$ ${subtotal.toFixed(2)}`;

        // Recalcula o total geral
        recalcularTotal();
    }

    // Função para recalcular o total
    function recalcularTotal() {
        let qtdProduto1 = parseInt(document.getElementById('qtdProduto1').innerText);
        let qtdProduto2 = parseInt(document.getElementById('qtdProduto2').innerText);

        let total = (qtdProduto1 * 50) + (qtdProduto2 * 30);
        document.getElementById('totalGeral').innerText = `R$ ${total.toFixed(2)}`;
    }
</script>

</html>
