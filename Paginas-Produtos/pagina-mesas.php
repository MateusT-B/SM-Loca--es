<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <script src="../js/bootstrap.min.js"></script>
    <title>SMLocações</title>
</head>
<body>
    
<!-- inclusão do cabeçalho -->
<!--Cabeçalho -->
<header id="cabecalho" class="bg-light p-3 text-white">
    <div  class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
<!-- Barra de navegação com Página Inicial etc-->
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <a href="index.php" class="navbar-brand " >
          <img id="logo" src="../img/logo.png" >
        </a>
        </ul>
        <li><a href="../index.php" class="nav-link px-2 text-dark">Página Inicial</a></li>
          <li><a href="../quemsomos.php" class="nav-link px-2 text-dark">Quem Somos</a></li>
          <li><a href="../produtos.php" class="nav-link px-2 text-dark">Produtos</a></li>
          <form id="pesquisa"  class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Pesquisa..." aria-label="Search">
        </form>    
        <!-- Botões de login e cadastro -->
        <div class="text-end">
            <a href="../admin/index.php">
                <button type="button" class="btn btn-outline-dark me-2">Login</button>
            </a>
            <a href="../cliente/registro.php">
                <button type="button" class="btn btn-outline-dark me-2">Cadastro</button>
            </a>
        </div>
      </div>

    </div>
</header>

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
        <li><img src="../icons/icone_copos-e-tacas.png" class="icone"><a href="../produtos.php">Copos e Taças</a></li>
                            <li><img src="../icons/icone_cristais.png" class="icone"><a href="../paginas-Produtos/pagina-cristais.php">Cristais</a></li>
                            <li><img src="../icons/icone_inox.png" class="icone"><a href="../paginas-Produtos/pagina-inox.php">Inox</a></li>
                            <li><img src="../icons/icone_mesas-e-cadeiras.png" class="icone"><a href="../paginas-Produtos/pagina-mesas.php">Mesas / Cadeiras / Pranchão</a></li>
                            <li><img src="../icons/icone_prata.png" class="icone"><a href="../paginas-Produtos/pagina-Prata.php">Prata</a></li>
                            <li><img src="../icons/icone_pratos.png" class="icone"><a href="../paginas-Produtos/pagina-Pratos.php">Pratos</a></li>
                            <li><img src="../icons/icone_sous-plat.png" class="icone"><a href="../paginas-Produtos/pagina-Sousplat.php">Sousplat</a></li>
                            <li><img src="../icons/icone_suqueiras.png" class="icone"><a href="../paginas-Produtos/pagina-Suqueiras.php">Suqueiras</a></li>
                            <li><img src="../icons/icone_talheres-e-acessorios.png" class="icone"><a href="../paginas-Produtos/pagina-Talheres.php">Talheres</a></li>
                            <li><img src="../icons/icone_utensilios.png" class="icone"><a href="../paginas-Produtos/pagina-Utensilios.php">Utensílios para Cozinha</a></li>
                            <li><img src="../icons/icone_xicaras-e-canecas.png" class="icone"><a href="../paginas-Produtos/pagina-Xicaras.php">Xícaras</a></li>  
        </ul>
      </div>
    </div>
    
    <!--<div class="banner-left"> <img src="image/banner-left2.png" alt=""> </div>--> 
  </div>
</div>


<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
  <div class="printable">
    <div class="col-main">
       <div class="topo-produtos">
          <h1 class="h1-eventos">Mesas</h1>
          <div class="row row-cols-1 row-cols-md-3 g-4">
          
<div class="card">
    <img src="img/produtos/mesas/pranchao.jpg">
    <div>
      <h1>Pranchao</h1>
      <span>R$ 25,00</span>
      <button a href="produtos.php" class="btn-comprar"  onclick="window.location.href='pagina-compras.php'">Alugar</a></button>
    </div>
  </div>

<div class="card">
    <img src="img/produtos/mesas/tampao.jpg">
    <div>
      <h1>Tampão</h1>
      <span>R$ 10,00</span>
      <button a href="produtos.php" class="btn-comprar"  onclick="window.location.href='pagina-compras.php'">Alugar</a></button>
    </div>
  </div>

  <div class="card">
    <img src="img/produtos/mesas/mesa-plastica.jpg">
    <div>
      <h1>Mesa Plastico</h1>
      <span>R$ 12,00</span>
      <button a href="produtos.php" class="btn-comprar"  onclick="window.location.href='pagina-compras.php'">Alugar</a></button>
    </div>
  </div>

  <div class="card">
    <img src="img/produtos/mesas/Cadeira-plastica.jpg">
    <div>
      <h1>Cadeira Platico</h1>
      <span>R$ 5,50</span>
      <button a href="produtos.php" class="btn-comprar"  onclick="window.location.href='pagina-compras.php'">Alugar</a></button>
    </div>
  </div>



 






  </div>
</div> <!-- Fim da div Taças --->


</div>
            
</div>
    </div>
</div>



</div> <!-- //! FIM DA DIV -->


<!-- inclusão do rodapé -->

<!-- Rodapé com link para redes sociais -->
<footer class="w-100 footer bg-dark  d-flex flex-wrap justify-content-center align-items-center py-3 my-0 border-top">
    <!-- Área de Conteúdo Centralizado -->
    <div class="container">
        <div class="row fundo-rodape justify-content-center">
            <!-- Área de Localização -->
            <div class="col-md-4">
                <div class="mb-4">
                <h4>Endereço</h4>
                    <address>
                        Rua Novo Millenium, Número 28 - Ferraz de Vasconcelos - São Paulo - SP - CEP 085366-10<br>
                    </address>
                    <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.874554391457!2d-46.382093499999996!3d-23.537013899999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce651ffa560ee7%3A0xd962a86c9db5bd96!2sR.%20Novo%20Millenium%20-%20Ferraz%20de%20Vasconcelos%2C%20SP!5e0!3m2!1spt-BR!2sbr!4v1729278743344!5m2!1spt-BR!2sbr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    </div>
                </div>
            </div>

            <!-- Links Úteis -->
            <div class="col-md-4">
                <div class="mb-4">
                    <h4>Links</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="index.php" class="text-danger nav-link" >
                            Página Inicial
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="quemsomos.php" class="text-danger nav-link">
                            Quem Somos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="produtos.php" class="text-danger nav-link">
                            Produtos
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Formulário de Contato -->
            <div class="col-md-4">
            <h4>Redes Sociais</h4>

        <!-- Ícones de Redes Sociais -->
            <div class="d-flex justify-content-center my-3">
            <a href="https://www.facebook.com/REALEVENT.SM" target="_blank" class="social-link text-center mx-2">
                <img class="imagens_redes_sociais" src="../img/rede-social/facebook.png" width="50" height="50" alt="Facebook">
                <p class="redes_sociais">@SM Locações</p>
            </a>
              <a href="https://www.instagram.com/sm_locacao?igsh=dnR0YnlmdHExYWJ3" target="_blank" class="social-link text-center mx-2">
                <img class="imagens_redes_sociais" src="../img/rede-social/instagram.png" width="50" height="50" alt="Instagram">
                <p class="redes_sociais">@sm_locacao</p>
              </a>
                <a href="https://wa.me/5511995421439" target="_blank" class="social-link text-center mx-2">
                    <img class="imagens_redes_sociais" src="../img/rede-social/whatsapp.png" width="50" height="50" alt="WhatsApp">
                    <p class="redes_sociais">(11)99542-1439</p>
                </a>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</footer>

    
</body>



</html>