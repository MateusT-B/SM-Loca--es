<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    

    <link rel="shortcut icon" href="img/favicon1.png" type="image/png">
    <title>SM-Locações</title>
    
</head>
<body>

<!-- inclusão do cabeçalho -->
<?php include ("cabecalho.php") ?>


<div id="container-compras"  class="container bg-white flex  p-2 ">
    <div class="d-flex flex-row">
        <div class="p-2">
            <div class="d-flex justify-content-center"> 
                <img src="img/produtos/suqueira/suqueira.jpg" alt="" class="img-fluid w-100 mb-3">
            </div>
            <div class="d-flex flex-row">
                <div class="mt-2"><label for="quantidade" class="form-label">Quantidade</label></div>
                <input type="number" class="form-control w-25 mb-1 me-1" id="quantidade" name="Quantidade" min="1" step="1">
                <button type="button" class="btn btn-success w-25">Alugar</button>
            </div>
        </div>
        <div class="p-2">
            <div class="my-5"><h1>Nome do produto</h1></div>                
            <div class="">
                <p class=" mb-5 fs-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit
                    Vero, magnam natus accusantium aspernatur,quis quibusdam autem mollitia 
                    fugiat hic ducimus quod. Numquam ex corporis repellat in? Ea earum consequatur 
                </p> 
            </div>
        </div>
    </div>     
</div>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>
    
  
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>