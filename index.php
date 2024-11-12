<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMLocações</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kavivanar&family=Parisienne&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="shortcut icon" href="img/favicon1.png" type="image/png">
</head>
<body>

<!-- inclusão do cabeçalho -->
<?php include ("cabecalho.php") ?>

<div class = "eventos">
  <br>
  
  <h1 class="h1-eventos">Eventos<h1>

  <div class = "img_eventos">
  <img class ="img_eventos" src="img/produtos/mesas/decorada 1.jfif" width = "22%" >
  <img class ="img_eventos" src="img/produtos/mesas/decorada 2.jfif" width = "22%">
  <img class = "img_eventos"src="img/produtos/mesas/decorada 4.jfif" width = "22%">

</div>



</div>

    <div class = "produtos-destaques">
      <h1 class ="h1-eventos"> Destaques </h1>
    </div>

      <div class ="destaques">
        <div class="card">
          <img  src="img/produtos/copos/copo-long-drink.jpg">
          <div>
            <h1>Copo long drink</h1>
            <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
          </div>
      </div>
                
                <div class="card">
                    <img src="img/produtos/copos/copo-whisky.jpg">
                  <div>
                    <h1>Copo Whisky</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
                  </div>
                </div>
              
                <div class="card">
                  <img src="img/produtos/cristais/prato-para-bolo.jpg">
                  <div>
                    <h1>Prato para bolo</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='Paginas-Produtos/pagina-cristais.php'">saiba mais</button>
                  </div>
                </div>
                
              <div class="card">
                <img src="img/produtos/prata/samovar.jpg">
                <div>
                  <h1>Samovar</h1>
                  <button class="btn btn-secondary" onclick="window.location.href='Paginas-Produtos/pagina-Prata.php'">saiba mais</button>
                </div>
              </div>
                
                <div class="card">
                  <img src="img/produtos/pratos/prato-wave.jpg">
                  <div>
                    <h1>Prato Wave</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='Paginas-Produtos/pagina-Pratos.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img  src="img/produtos/utensilios cozinha/garrafa-termica-cafe.png">
                  <div>
                    <h1>Garrafa Termica</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='Paginas-Produtos/pagina-inox.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img  src="img/produtos/talheres/garfo-sobremesa-dourado.png">
                  <div>
                    <h1>Garfo Dourado</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='Paginas-Produtos/pagina-Talheres.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img src="img/produtos/taças/taça-vinho.png">
                  <div>
                    <h1>Taça Vinho</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
                  </div>
                </div>

<a href="produtos.php" class="btn btn-secondary ">Veja nosso Catalogo</a>
</div>







<br>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>




    
</body>

</html>