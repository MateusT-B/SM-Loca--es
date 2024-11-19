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
  <img class ="img_eventos" src="img/produtos/decorada 1.jfif" width = "22%" >
  <img class ="img_eventos" src="img/produtos/decorada 2.jfif" width = "22%">
  <img class = "img_eventos"src="img/produtos/decorada 4.jfif" width = "22%">

</div>
</div>
<br>

<?php 
include 'banco/connect.php';
$lista = $conn->query("select * from vw_produtos where destaque = 'Sim'");
$row_produtos = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>



<?php if($num_linhas ==0){ ?>
  <h2 class="breadcrumb alert-danger"> 
    Não há produtos em destaque!
  </h2>
<?php }?>

<br>
<?php if($num_linhas > 0){ ?>
  <h1 class ="h1-eventos"> 
    Destaques 
  </h1>
    <div class ="destaques">
      <?php do{?>
        <div class="card">
          <img  src="img/produtos/<?php echo $row_produtos['imagem'] ?>" alt=""  class="img-fluid">
          <div>
            <h1>
              <strong><?php echo $row_produtos['nome_produto']?></strong>
            </h1>
            
          </div>
          </div>  
        <?php } while($row_produtos = $lista->fetch_assoc());?>            
    </div>
  <?php } ?>
</div>


<div class="d-flex justify-content-center mt-5">
  <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">Veja nosso catálogo</button>
</div>


<br>

<!-- inclusão do rodapé -->
<?php include ("rodape.php") ?>




    
</body>
</html>