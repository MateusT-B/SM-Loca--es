<!-- CONECTAR NO BANCO E SELECIONAR AS INFORMAÇÕES -->
<?php
include '../acesso_com.php';
include '../../banco/connect.php';

$lista = $conn -> query("select * from categorias");
$row = $lista -> fetch_assoc();
$rows = $lista -> num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="shortcut icon" href="../../img/favicon1.png" type="image/png">
</head>
<body class="corpo_lista"> 
    <?php include '../menu_adm_op.php'; ?>

    <main class="container-lista container-categoria">
        <h2 class="breadcrumb-lista alert alert-primary">Lista de Categorias</h2>

        <table class="table-lista table-hover-lista table-condensed-lista tb-opacidade-lista tabela-categoria">
            <thead>
                <tr>
                    <th class="d-none">ID</th>
                    <th>SIGLA</th>
                    <th>ROTULO</th>
                    <th></th>
                    <th></th>
                    <th>
                        <a href="insere_categorias.php" class="btn btn-primary btn-xs">
                            <span class="add">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                            </span> <span class="hidden-xs">ADICIONAR</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <td class="d-none"><?php echo $row['produto_id']; ?></td>
                        <td><?php echo $row['sigla']; ?></td>
                        <td><?php echo $row['rotulo']; ?></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a  
                                href="update_categorias.php?id=<?php echo $row['id'] ?>" 
                                role="button" 
                                class="btn btn-warning btn-block btn-xs"
                            >
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                    </svg>
                                </span>
                                <span class="hidden-xs">ALTERAR</span>    
                            </a>
                            <!-- Botão excluir -->
                            <button 
                                data-nome="<?php echo $row['sigla']; ?>"
                                data-id="<?php echo $row['id']; ?>"
                                class="delete btn btn-xs btn-block btn-danger"     
                            >
                                <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg>    
                                </span>
                                </span>
                                <span class="hidden-xs">EXCLUIR</span>
                        </td>
                    </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
            </tbody>
        </table>
    </main>

    <!-- Modal de confirmação de exclusão -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Excluindo Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    Deseja mesmo excluir o item? Saiba, essa ação não pode ser desfeita.
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger delete-yes">Confirmar</a>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.delete').on('click', function() {
            var nome = $(this).data('nome'); // busca o nome do produto
            var id = $(this).data('id'); // busca o id do produto
            $('span.nome').text(nome); // insere o nome no modal
            $('a.delete-yes').attr('href', 'delete_categorias.php?id=' + id); // define o link de exclusão
            $('#modalEdit').modal('show'); // exibe o modal
        });
    </script>
</body>
</html>
