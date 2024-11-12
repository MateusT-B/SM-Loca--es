<?php
// arquivo de conexão com o banco
include 'banco/connect.php';

//consulta para filtrar os dados

//$id = $_GET['id'];
///$informacaoproduto = $conn->query("select * from produtos where id =$id");
//$informacaoproduto = $informacaoproduto->fetch_assoc();
//$numinformacaoproduto = $
//?>

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


<div id="container-compras"  class="col-sm-6 col-md-4 bg-white flex mx-auto p-2">
        <div class="d-flex justify-content-center">
            <img src="img/produtos/suqueira/suqueira.jpg" alt="suqueira" class="img-fluid w-75">
        </div>
        <div class="d-flex justify-content-center my-3"> 
            <h3>
                Nome do produto
            </h3>
        </div>
        <div class="d-flex justify-content-center my-3">
            <p class=" fs-5">
                Pode ser usado para degustar qualquer tipo de bebida
            </p> 
        </div>  
        <div>
            <div class="d-flex flex-row">
                <label for="quantidade" class="form-label mt-2">Quantidade</label>
                <input type="number" id="seletorqnt-compras" class="form-control mb-1 me-1" id="quantidade" name="Quantidade" min="1" step="1">   
                <button type="button" class="btn btn-success  ">Alugar</button>
            </div>
        </div> 
 </div>   

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>
    
  
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>