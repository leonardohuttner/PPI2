<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require_once('../entities/vaga.php');
    
    if(!isset($_REQUEST['op'])){
        header('Location: ../../admin-vaga.php');
    }
    
    $operacao = null;
    
    if(empty($_REQUEST['op'])){
        $operacao = 'listar';
    }
    
    if(!empty($_REQUEST['op'])){
        $operacao = filter_var($_GET['op'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    var_dump($operacao);
    switch($operacao){
        case 'novo':
            novaVaga();
            break;
        case 'editar':
            editarVaga($_GET['id']);
            break;
        case 'excluir':
            excluirVaga($_GET['id']);
            break;
        case 'atualizar':
            atualizarVaga($_GET['id']);
            break;
    }
    
    function novaVaga(){    
        $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_var($_POST['descricao']);
        $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_SPECIAL_CHARS);
        
        $vaga = new Vaga();
        $vaga->setTitulo($titulo);
        $vaga->setDescricao($tipo);
        $vaga->setTipo($descricao);
        $vaga->setEmpresa($empresa);
        if($vaga->novo()){
            header('Location: ../../index.php?erro=6');
        }else{
            header('Location: ../../index.php?erro=7');
        }
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
        if($vaga->excluir()){
            header('Location: ../../admin-vaga.php?erro=5');
        }else{
            header('Location: ../../admin-vaga.php?erro=4');
        }
    }
    
    function atualizarVaga(){
        if(empty($_POST['id'])){
            header('Location: ../../index.php?erro=2');
            exit;
        }
    
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $descricao = filter_var($_POST['descricao']);
        $tipo = filter_var($_POST['tipo'], FILTER_SANITIZE_SPECIAL_CHARS);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_SPECIAL_CHARS);
        
        $posts = new Vaga();
        $post = $posts->selecionar($id);
        $post->setTitulo($titulo);
        $post->setDescricao($tipo);
        $post->setTipo($descricao);
        $post->setEmpresa($empresa);
        if($post->atualizar()){
            header('Location: ../../index.php?erro=3');
        }else{
            header('Location: ../../index.php?erro=2');
        }
    }
?>