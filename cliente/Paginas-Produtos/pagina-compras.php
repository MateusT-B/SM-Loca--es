<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="shortcut icon" href="../img/favicon1.png" type="image/png">
    <title>SM-Locações</title>
</head>
<body>

<!-- inclusão do cabeçalho -->
<?php include ("menu_cliente.php") ?>

<?php
// Inclusão da conexão com o banco
include '../../banco/connect.php';

// Verificação de segurança para garantir que o parâmetro 'id' esteja presente na URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Usando consulta preparada para evitar injeção de SQL
    $stmt = $conn->prepare("SELECT * FROM vw_produtos WHERE id_produto = ?");
    $stmt->bind_param("i", $id);  // 'i' para inteiro
    $stmt->execute();
    $result = $stmt->get_result();
    $num_linhas = $result->num_rows;
} else {
    echo "<h2 class='breadcrumb alert-danger'>Erro: ID não fornecido ou inválido!</h2>";
    exit();  // Encerra o script se o ID não for válido
}
?>

<?php if($num_linhas == 0): ?>
    <h2 class="breadcrumb alert-danger"> 
        0 produtos cadastrados!
    </h2>
<?php else: ?>  
    <div id="container-compras" class="col-sm-6 col-md-4 bg-white flex mx-auto p-2">
        <?php while ($row_produtos = $result->fetch_assoc()): ?>
            <div class="d-flex justify-content-center">
                <img src="../../img/produtos/<?php echo htmlspecialchars($row_produtos['imagem']); ?>" alt="" class="img-fluid w-75">
            </div>
            <div class="d-flex justify-content-center my-3"> 
                <h3>
                    <?php echo htmlspecialchars($row_produtos['nome_produto']); ?> 
                </h3>
            </div>
            <div class="d-flex justify-content-center my-1">
                <p class="fs-5">
                    <?php echo htmlspecialchars($row_produtos['descricao']); ?>
                </p> 
            </div>  
            <div>
                <div class="d-flex flex-row">
                    <label id="lblquantidade" for="quantidade" class="form-label mt-2 me-1">Quantidade</label>
                    <input type="number" id="seletorqnt-compras" class="form-control mb-1 me-2" name="Quantidade" min="1" step="1">   
                    <button type="button" class="btn btn-success btn-sm mb-1">Alugar</button>
                </div>
            </div> 
        <?php endwhile; ?>
    </div>
<?php endif; ?>  

<!-- inclusão do rodapé -->
<?php include ("rodape.php")?>


<script src="../js/bootstrap.min.js"></script>
</body>
</html>
