<?php
// Iniciar a sessão
session_start();

// Finalizar a sessão
session_destroy();

// Redirecionar para a página inicial ou login
header("Location: ../index.php");
exit();
?>
