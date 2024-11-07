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
    <link rel="shortcut icon" href="img/favicon1.png" type="image/png">
</head>
<body>

<!-- inclusão do cabeçalho -->
<?php include ("cabecalho.php") ?>

<div class ="minhas-imagens">
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/produtos/mesas/mesa-decorada .jpg" class="d-block w-100" alt="...">
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
        <div class="card">
          <img class="img_destaques" src="img/produtos/copos/copo-long-drink.jpg">
          <div>
            <h1>Copo long drink</h1>
            <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
          </div>
      </div>
                
                <div class="card">
                    <img class="img_destaques" src="img/produtos/taças/taça-diamante.png">
                  <div>
                    <h1>Taça Diamante</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
                  </div>
                </div>
              
                <div class="card">
                  <img class="img_destaques" src="img/produtos/cristais/prato-para-bolo.jpg">
                  <div>
                    <h1>Prato para bolo</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-cristais.php'">saiba mais</button>
                  </div>
                </div>
                
              <div class="card">
                <img class="img_destaques" src="img/produtos/prata/samovar.jpg">
                <div>
                  <h1>Samovar</h1>
                  <button class="btn btn-secondary" onclick="window.location.href='pagina-Prata.php'">saiba mais</button>
                </div>
              </div>
                
                <div class="card">
                  <img class="img_destaques" src="img/produtos/pratos/prato-wave.jpg">
                  <div>
                    <h1>Prato Wave</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-Pratos.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img class="img_destaques" src="img/produtos/rechaud/rechaud-cuba.jpg">
                  <div>
                    <h1>Rechaud Cuba</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-inox.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img class="img_destaques" src="img/produtos/sousplat/sousplat-aluminio.jpg">
                  <div>
                    <h1>Sousplat de Aluminio</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-Sousplat.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img class="img_destaques" src="img/produtos/suqueira/suqueira.jpg">
                  <div>
                    <h1>Suqueira</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-Suqueiras.php'">saiba mais</button>
                  </div>
                </div>
                
                <div class="card">
                  <img class="img_destaques" src="img/produtos/talheres/colher-cafe-dourado.png">
                  <div>
                    <h1>Colher Dourada</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-Talheres.php'">saiba mais</button>
                  </div>
                </div>

                <div class="card">
                  <img class="img_destaques" src="img/produtos/utensilios cozinha/garrafa-termica-cafe.png">
                  <div>
                    <h1>Garrafa Termica</h1>
                    <button class="btn btn-secondary" onclick="window.location.href='pagina-Utensilios.php'">saiba mais</button>
                  </div>
                </div>
                
          <div class="card">
            <img class="img_destaques" src="img/produtos/xicaras/xicara-80ml.jpg">
            <div>
                <h1>Xicara</h1>
                <button class="btn btn-secondary" onclick="window.location.href='pagina-Xicaras.php'">saiba mais</button>
            </div>
          </div>

          <div class="card">
            <img class="img_destaques" src="img/produtos/talheres/kit-talheres-inox.png">
            <div>
                <h1>Kit talheres inox</h1>
                <button class="btn btn-secondary" onclick="window.location.href='pagina-Talheres.php'">saiba mais</button>
            </div>
          </div>

          <a href="produtos.php" class="btn btn-secondary ">Veja nosso Catalogo</a>
</div>

<div class = "Eventos">
  <br>
  <h1> Eventos <h1>
  <img class ="img_eventos" src="img/produtos/mesas/Mídia.jfif" width = "15%" >
  <img class ="img_eventos" src="img/produtos/mesas/9 fotos adicionadas.jfif" width = "15%">


</div>

<br>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>



    
</body>

</html>