<!DOCTYPE html>
<html lang="en">
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

<!-- Titulo do carrinho de compras com o icone -->
<div class="container ">
    <div class="row ">
        <div class="col">
            <img src="../icons/market-car.png" alt="carrinho_de_compras" width="5%">
            
        </div>
    </div>
</div>

<br>

<div class="container">
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
</div>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>
    
</body>
</html>