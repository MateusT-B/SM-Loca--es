<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <title>Página inicial</title>
</head>
<body>
<!--- inclusão do cabeçalho --->
<?php include ("../cliente/menu_cliente.php")?>

<div class = "eventos">
  <br>
  
  <h1 class="h1-eventos">Eventos<h1>

  <div class = "img_eventos">
  <img class ="img_eventos" src="../img/produtos/decorada 1.jfif" width = "22%" >
  <img class ="img_eventos" src="../img/produtos/decorada 2.jfif" width = "22%">
  <img class = "img_eventos"src="../img/produtos/decorada 4.jfif" width = "22%">

</div>
</div>

<?php 
include '../banco/connect.php';
$lista = $conn->query("select * from vw_produtos where destaque = 'Sim'");
$row_produtos = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>



<?php if($num_linhas ==0){ ?>
  <h2 class="breadcrumb alert-danger"> 
    Não há produtos em destaque!
  </h2>
<?php }?>


<?php if($num_linhas > 0){ ?>
  <h1 class ="h1-eventos"> 
    Destaques 
  </h1>
    <div class ="destaques">
      <?php do{?>
        <div class="card">
          <img  src="../img/produtos/<?php echo $row_produtos['imagem'] ?>" alt=""  class="img-fluid">
          <div>
            <h1>
              <strong><?php echo $row_produtos['nome_produto']?></strong>
            </h1>
            <button class="btn btn-secondary" onclick="window.location.href='produtos.php'">saiba mais</button>
          </div>
          </div>  
        <?php } while($row_produtos = $lista->fetch_assoc());?>            
    </div>
  <?php } ?>
</div>
<div>
  <a href="produtos.php" class="btn btn-secondary ">Veja nosso Catalogo</a>   
</div>




<br>


<!-- inclusão do rodapé -->
<?php include ("../cliente/rodape.php") ?>

</body>
</html>