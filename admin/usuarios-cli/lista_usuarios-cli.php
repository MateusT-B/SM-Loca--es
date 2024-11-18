<!-- CONECTAR NO BANCO E SELECIONAR AS INFORMAÇÕES -->
<?php
include '../acesso_com.php';
include '../../banco/connect.php';

$lista = $conn -> query("select * from usuarios_clientes_web");
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
</head>
<body class="corpo_lista"> 
    <?php include '../menu_adm_op.php'; ?>

    <main class="container-lista">
        <h2 class="breadcrumb-lista alert alert-warning">Lista de Usuários</h2>

        <table class="table-lista table-hover-lista table-condensed-lista tb-opacidade-lista bg-warning-lista">
            <thead class="thead-prod">
                <tr>
                    <th class="d-none">ID</th>
                    <th class="d-none">ID_FUNC ou ID_CLI</th>
                    <th>USUÁRIO</th>
                    <th>ATIVO</th>
                    <th>TIPO</th>
                    <th>
                        <a href="insere_usuarios-cli.php" class="btn btn-primary btn-xs">
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
                        <td class="d-none"><?php echo $row['id']; ?></td>
                        <td class="d-none">
                            <?php
                                if ($row['tipo_func'] == 'fun') {
                                    echo '<td class="d-none">' . $row['id_funcionario'] . '</td>';
                                } else {
                                    echo '<td class="d-none">' . $row['id_cliente'] . '</td>';
                                }
                                ?> 
                        </td>
                        <td class="d-none"><?php echo $row['usuario']; ?></td>
                        <td>
                            <?php
                                if($row['ativo'] == 'Sim') {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                    </svg>';
                                } else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                    <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                    </svg>';
                                }
                                ?>
                        <td class="d-none"><?php echo $row['tipo']; ?></td>
                        </td>
                            <a
                                href="update_usuarios.php?id=<?php echo $row['id'] ?>" 
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
                        </td>
                    </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
            </tbody>
        </table>
    </main>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('.delete').on('click', function() {
            var nome = $(this).data('nome'); // busca o nome do produto
            var id = $(this).data('id'); // busca o id do produto
            $('span.nome').text(nome); // insere o nome no modal
            $('a.delete-yes').attr('href', 'delete_produtos.php?id=' + id); // define o link de exclusão
            $('#modalEdit').modal('show'); // exibe o modal
        });
    </script>
</body>
</html>
