<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../../img/favicon1.png" type="image/png">
    <script src="../js/bootstrap.min.js"></script>
    <title>SMLocações</title>
</head>
<body>
    
<!-- inclusão do cabeçalho -->

<?php include ("menu_adm.php") ?>

<div class = "main">
  <div class = "row">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 hidden-xs">
      <div class="col-left sidebar">
        <div class="block block-layered-nav">
          <div class="bx-title new-title">
              <h2>CATEGORIAS</h2>
      </div>
      <div class="block-content">
        <ul class="cd-accordion-menu animated">
        <li><img src="../../icons/icone_copos-e-tacas.png" class="icone"><a href="../../admin/produtos.php">Copos e Taças</a></li>
                            <li><img src="../../icons/icone_cristais.png" class="icone"><a href="../paginas-Produtos/pagina-cristais.php">Cristais</a></li>
                            <li><img src="../../icons/icone_inox.png" class="icone"><a href="../paginas-Produtos/pagina-inox.php">Inox</a></li>
                            <li><img src="../../icons/icone_mesas-e-cadeiras.png" class="icone"><a href="../paginas-Produtos/pagina-mesas.php">Mesas / Cadeiras / Pranchão</a></li>
                            <li><img src="../../icons/icone_prata.png" class="icone"><a href="../paginas-Produtos/pagina-Prata.php">Prata</a></li>
                            <li><img src="../../icons/icone_pratos.png" class="icone"><a href="../paginas-Produtos/pagina-Pratos.php">Pratos</a></li>
                            <li><img src="../../icons/icone_sous-plat.png" class="icone"><a href="../paginas-Produtos/pagina-Sousplat.php">Sousplat</a></li>
                            <li><img src="../../icons/icone_suqueiras.png" class="icone"><a href="../paginas-Produtos/pagina-Suqueiras.php">Suqueiras</a></li>
                            <li><img src="../../icons/icone_talheres-e-acessorios.png" class="icone"><a href="../paginas-Produtos/pagina-Talheres.php">Talheres</a></li>
                            <li><img src="../../icons/icone_utensilios.png" class="icone"><a href="../paginas-Produtos/pagina-Utensilios.php">Utensílios para Cozinha</a></li>
                            <li><img src="../../icons/icone_xicaras-e-canecas.png" class="icone"><a href="../paginas-Produtos/pagina-Xicaras.php">Xícaras</a></li>  
        </ul>
      </div>
    </div>
    
    <!--<div class="banner-left"> <img src="image/banner-left2.png" alt=""> </div>--> 
  </div>
</div>

<?php 
include '../../banco/connect.php';
$lista = $conn->query("select * from vw_produtos where rotulo ='mesas/cadeiras/pranchao'");
$row_produtos = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
?>

<?php if($num_linhas == 0){?>
  <h2>
    0 produtos cadastrados!
  </h2>
<?php }?> 

<?php if($num_linhas > 0){?>
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
  <div class="printable">
    <div class="col-main">
      <div class="topo-produtos">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php do{ ?> 
            <div class="card">
              <img src="../../img/produtos/<?php echo $row_produtos['imagem'] ?>">
                <div>
                  <h1><?php echo $row_produtos['nome_produto'] ?></h1>
                    <span><?php echo "R$ ".number_format($row_produtos['valor'],2,',','.')?></span>
                   </div>
                 </div>
                <?php } while($row_produtos = $lista->fetch_assoc());?>
              </div> <!-- Fim da div Mesas,Cadeiras e Pranchao -->
            </div>            
          </div>
        <?php }?> 
      </div>
    </div>
  </div> 
</div> <!-- //! FIM DA DIV -->

<!-- inclusão do rodapé -->

<?php include ("rodape.php")?>

    
</body>



</html>