<?php
    $json = file_get_contents("bd.json");
    $data = json_decode($json);

    if(!$json){
        echo('Banco não conectado');
        $json = null;
    };

    if(!$data) {
        echo('Sem dados');
        $json = null;
    }

    if(!isset($_REQUEST['operacao'])) $operacao = null;
    if(isset($_REQUEST['operacao'])) $operacao = filter_var($_REQUEST['operacao']);
    switch($operacao){
        case 'vagas':
            carrega_vagas();
            break;
        case 'entrevista':
            carrega_entrevistas();
            break;
    }

    function carrega_vagas(){

    }

    function carrega_entrevistas(){

    }
?>