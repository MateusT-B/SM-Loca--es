<!-- CONECTAR NO BANCO E SELECIONAR AS INFORMAÇÕES -->
<?php
include '../acesso_com.php';
include '../../banco/connect.php';

$lista = $conn -> query("select * from vw_dados_funcionarios");
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

    <main class="container-lista">
        <h2 class="breadcrumb-lista alert alert-secondary">Lista de Funcionários</h2>

        <table class="table-lista table-hover-lista table-condensed-lista tb-opacidade-lista bg-secondary-lista">
            <thead class="thead-prod">
                <tr>
                    <th class="d-none">ID</th>
                    <th>USUÁRIO</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>ENDEREÇO</th>
                    <th>TIPO ENDEREÇO</th>
                    <th>ATIVO</th>
                    <th>
                        <a href="insere_funcionarios.php" class="btn btn-primary btn-xs">
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
                        <td class="d-none"><?php echo $row['id_funcionario']; ?></td>
                        <td><?php echo $row['usuario_web']; ?></td>
                        <td><?php echo $row['nome_funcionario']; ?></td>
                        <td><?php echo $row['cpf']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefone']?></td>
                        <td><?php echo $row['logradouro'] . ", " . $row['numero'] . ", " . $row['bairro'] . ", " . $row['cidade'] . ", " . $row['uf'] . ", " . $row['cep']?></td>
                        <td><?php echo $row['tipo_endereco']?></td>
                        <td>
                            <?php
                                if($row['conta_web_ativa'] == 'Sim') {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
                                    </svg>';
                                } else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                    <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                    </svg>';
                                }
                                ?>
                        </td>
                    </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
            </tbody>
        </table>
    </main>
</body>
</html>
