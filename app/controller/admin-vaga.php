<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once('../entities/vaga.php');
    
    if(!isset($_REQUEST['op'])){
        header('Location: ../../admin-posts.php');
    }
    
    $operacao = null;
    
    if(empty($_REQUEST['op'])){
        $operacao = 'listar';
    }
    
    if(!empty($_REQUEST['op'])){
        $operacao = filter_var($_GET['op'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    
    switch($operacao){
        case 'listar':
            listarPosts();
            break;
        case 'editar':
            editarVaga($_GET['id']);
            break;
        case 'excluir':
            excluirVaga($_GET['id']);
            break;
        // case 'atualizar':
        //     atualizarVaga();
        //     break;
    }
    
    function listarPosts(){
    
    }
    
    function editarVaga($id){
        $vagas = new Vaga();
        $vaga = $vagas->selecionar($id);
        require_once('../../admin-vaga.php');
    }
    
    function excluirVaga($id){
            
        if(empty($id)){
            header('Location: ../../admin-vaga.php?erro=4');
            exit;
        }
    
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $vagas = new Vaga();
        $vaga = $vagas->selecionar($id);
        var_dump($vaga);exit;
        if($vaga->excluir()){//se excluiu corretamente
            header('Location: ../../admin-vaga.php?erro=5');
        }else{//se deu ruim
            header('Location: ../../admin-vaga.php?erro=4');
        }
    }
    
    // function atualizarVaga(){
    //     if(empty($_POST['id'])){
    //         header('Location: ../../admin-vaga.php?erro=2');
    //         exit;
    //     }
    
    //     $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    //     $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
    //     $data = filter_var($_POST['data']);
    //     $autor = filter_var($_POST['autor'], FILTER_SANITIZE_SPECIAL_CHARS);
    //     $texto = filter_var($_POST['texto'], FILTER_SANITIZE_SPECIAL_CHARS);
        
    //     $posts = new Post();
    //     $post = $posts->selecionar($id);
    //     $post->setTitulo($titulo);
    //     $post->setAutor($autor);
    //     $post->setData($data);
    //     $post->setTexto($texto);
    //     if($post->atualizar()){
    //         header('Location: ../../admin-vaga.php?erro=3');
    //     }else{
    //         header('Location: ../../admin-vaga.php?erro=2');
    //     }
    // }
?>