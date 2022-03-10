<?php
    var_dump($_POST['operacao']);
    exit;

    if(!isset($_RESQUEST['operacao'])) $operacao = null;
    if(isset($_RESQUEST['operacao'])) $operacao = filter_var($_RESQUEST['operacao']);
    switch($operacao){
        case 'login':
            login();
            break;
        case 'logout':
            logout();
            break;
    }

    function login(){
        if(empty($_RESQUEST['usuario']) || empty($_RESQUEST['senha']) ){
            header('Location: ../../login.php?erro=1');
            return false;
        }

        $usuario = filter_var($_RESQUEST['usuario']);
        // FILTER_VALIDADE_EMAIL
        $senha = filter_var($_RESQUEST['senha']);

        if($usuario != 'teste@teste.com' && $senha !='1234' ){
            header('Location: ../../login.php?erro=2');
            return false;
        }

        session_start();
        session_regenerate_id();
        $_SESSION['email'] = $usuario;
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = "Fulano";
        header('Location: ../../perfil.php');
        return true;
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: ../../login.php?erro=4');
        return true;
    }