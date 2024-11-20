<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cabeçalho</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>

<header id="cabecalho" class="bg-light p-3 text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <a href="../../cliente/index.php" class="navbar-brand">
                    <img id="logo" src="../../img/logo.png" alt="Logo">
                </a>
            </ul>
            <li><a href="../index.php" class="nav-link px-2 text-dark">Página Inicial</a></li>
            <li><a href="../quemsomos.php" class="nav-link px-2 text-dark">Quem Somos</a></li>
            <li><a href="../produtos.php" class="nav-link px-2 text-dark">Produtos</a></li>

            <form id="pesquisa" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Pesquisa..." aria-label="Search">
            </form>
            
            <div class="d-flex align-items-center">
                <div class="dropdown me-3">
                    <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../icons/icon-user.png" alt="icon-user" width="50">
                        <?php if(isset($_SESSION['usuario_usuario'])): ?>
                            <span class="ms-2"><?php echo htmlspecialchars($_SESSION['usuario_usuario']); ?></span>
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="../cliente/cliente_config.php">Atualizar dados</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="../cliente/logout.php">Sair</a></li>
                    </ul>
                </div>

                <a href="../cliente/cliente_carrinho.php" class="text-dark">
                    <img src="../../icons/market-car.png" alt="market-car" width="50">
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Bootstrap JS e Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
