<?php
    if(!isset($_REQUEST['operacao'])) $operacao = null;
    if(isset($_REQUEST['operacao'])) $operacao = filter_var($_REQUEST['operacao']);
    switch($operacao){
        case 'login':
            login();
            break;
        case 'logout':
            logout();
            break;
    }

    function login(){  
        if(empty($_POST['email']) || empty($_POST['senha']) ){
            header('Location: ../../login.php?erro=1');
            return false;
        }

        $email = filter_var($_POST['email']);
        // FILTER_VALIDADE_EMAIL
        $senha = filter_var($_POST['senha']);
        
        $json = file_get_contents("bd.json");
        $data = json_decode($json);
        
        foreach ($data->usuarios as $item) {
            if($email == $item->email){
                if($senha == $item->senha){
                    if (!session_id()) {
                        session_start();
                    }
                    session_regenerate_id();
                    $_SESSION['email'] = $email;
                    $_SESSION['logado'] = true;
                    $_SESSION['nome'] = $item->nome;
                    header('Location: ../../perfil.php');
                    return true;
                }else {
                    header('Location: ../../login.php?erro=2&caiu1');
                    return false;
                }
            }
        }
    }

    function logout(){
        session_start();
        session_destroy();
        header('Location: ../../login.php?erro=4');
        return true;
    }