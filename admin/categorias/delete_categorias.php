<?php 
include '../acesso_com.php';
include '../../banco/connect.php';

$id = $_GET['id'];
$excluirProduto = "DELETE FROM categorias WHERE id=$id";
$resultado = $conn->query($excluirProduto);
header ("location: lista_categorias.php");
?>