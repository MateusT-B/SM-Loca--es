<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMLocações</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
</head>
<body>


<!-- inclusão do cabeçalho -->
<?php include ("cabecalho.php") ?>

<div class ="minhas-imagens">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/produtos/mesas/Mesa decorada (1).jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/produtos/mesas/mesa decorada 4 (1).jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/produtos/mesas/mesa decorada 5 (1).jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class=" carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
</div>



</div>

<div class = "produtos-destaques">
  <h1> Destaques </h1>
</div>

<div class ="destaques">
  <tr>
    <td>  <img src="img/produtos/taças/taça-champanhe.jpg" width = 8% >
    <td>  <img src="img/produtos/copos/copo-whisky.jpg" width = 8% >
    <td>  <img src="img/produtos/copos/copo-long-drink.jpg" width = 8% >
    <td>  <img src="img/produtos/taças/taça-vinho.png" width = 8% >
    <td>  <img src="img/produtos/copos/copo-chopp.jpg" width = 8% >
</tr>

</div>

<div class = "catalogo">
<a href="produtos.php" class="btn btn-primary ">Veja nosso Catalogo</a>


</div>


<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>



    
</body>

</html>