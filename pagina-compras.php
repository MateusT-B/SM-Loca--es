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

<div class="container flex border border-warning  p-2 my-2">
    <div class="bg-dark text-center my-2">
        <img src="img/produtos/suqueira/suqueira.jpg" alt="" class="img-fluid w-25">
    </div> 
    <div class="bg-success w-50">
        <label for="quantidade" class="form-label">Quantidade</label>
        <input type="number" class="form-control w-25" id="quantidade" name="Quantidade" min="1" step="1">
    </div>
    <div class="bg-danger w-50">
        <button type="button" class="btn btn-success btn-lg">Adicionar</button>
    </div>
   

</div>
    
        
    
  
        

        

<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>