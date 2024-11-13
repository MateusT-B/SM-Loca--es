<?php 
include '../acesso_com.php';
include '../../banco/connect.php';
if($_POST)
{
    $sigla = $_POST['sigla']; 
    $rotulo = $_POST['rotulo'];
    
    $insereCategoria = "insert categorias 
                    (sigla, rotulo)
                    values
                    ('$sigla', '$rotulo') 
                    ";
    $resultado = $conn->query($insereCategoria);            
    if(mysqli_insert_id($conn)){
        header('lista_categorias.php');
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <title>SM Locações - Inserir Categorias</title>
</head>
<body>
<?php include "../menu_adm_op.php";?>
<main class="container-inserir mx-auto">
    <div class="mx-auto">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8 mx-auto">
            <h2 class="breadcrumb-insere alert text-primary">
                <a href="lista_categorias.php">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    </button>
                </a>
                Inserindo Categorias
            </h2>
            <div class="thumbnail-insere">
                <div class="alert alert-primary" role="alert">
                    <form action="insere_categorias.php" method="post" 
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
                            <label for="sigla">Insira a sigla:</label>     
                        <div class="input-group-text">
                           <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8m0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5"/>
                                </svg>                           
                            </span>
                           <input type="text" name="sigla" id="sigla" 
                                class="form-control" placeholder="Digite a sigla da nova categoria:"
                                maxlength="3" required>
                        </div>   
                        <label for="rotulo">Insira o rótulo:</label>     
                        <div class="input-group-text">
                            <span class="input-group-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-blockquote-left" viewBox="0 0 16 16">
                                <path d="M2.5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm5 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm-5 3a.5.5 0 0 0 0 1h11a.5.5 0 0 0 0-1zm.79-5.373q.168-.117.444-.275L3.524 6q-.183.111-.452.287-.27.176-.51.428a2.4 2.4 0 0 0-.398.562Q2 7.587 2 7.969q0 .54.217.873.217.328.72.328.322 0 .504-.211a.7.7 0 0 0 .188-.463q0-.345-.211-.521-.205-.182-.568-.182h-.282q.036-.305.123-.498a1.4 1.4 0 0 1 .252-.37 2 2 0 0 1 .346-.298zm2.167 0q.17-.117.445-.275L5.692 6q-.183.111-.452.287-.27.176-.51.428a2.4 2.4 0 0 0-.398.562q-.165.31-.164.692 0 .54.217.873.217.328.72.328.322 0 .504-.211a.7.7 0 0 0 .188-.463q0-.345-.211-.521-.205-.182-.568-.182h-.282a1.8 1.8 0 0 1 .118-.492q.087-.194.257-.375a2 2 0 0 1 .346-.3z"/>
                                </svg>                           
                                </span>
                           <input type="text" name="rotulo" id="rotulo" 
                                class="form-control" placeholder="Digite o rótulo da nova categoria:"
                                maxlength="30" required>
                        </div>  
                        <br>
                        <input type="submit" name="enviar" id="enviar" class="btn btn-primary btn-block" value="Cadastrar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>