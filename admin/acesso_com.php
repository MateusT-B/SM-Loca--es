<?php
    session_name('sm');
    if(!isset($_SESSION)){
        session_start();
    }
    // segurança digital
 
    // verificar se o usuário esta logado na sessão
    if(!isset($_SESSION['login_usuario'])){
        //se não existir, redirecionamos a sessão por segurança
        //header('location: login.php'); //redirecionamento
        //exit;
    }
 
    $nome_da_sessao = session_name();
    // if(!isset($_SESSION['nome_da_sessao'])
    //     or ($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    //         session_destroy();
    //         header('location: login.php');
    // }

    //se o acesso com php funciona, o logout funciona 
    //porém, para de encontrar todos os insets, listas, etc.
?>