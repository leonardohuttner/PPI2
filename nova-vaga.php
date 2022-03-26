<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="CSS/index.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JOBS | Editar Vaga</title>
    </head>
    <body>
        <?php
            session_start();
                if(!$_SESSION['logado']){
                    require_once('layout/header.php');
                } else {
                    require_once('layout/header_logado.php');
                }
                require_once('app/entities/Vaga.php');
                var_dump($_GET);
                $vaga = new Vaga();
        ?>
    <section>
        <h2>Nova vaga</h2>
        <form name="form-criar" method="post" action="app/controller/admin-vaga.php?op=novo">
            Titulo: <input type="text" name="titulo">
            <br />
            Empresa: <input type="text" name="empresa">
            <br />
            tipo: <input type="text" name="tipo">
            <br />
            Descricao: <br /><textarea name="descricao"></textarea>
            <br />
            <input type="hidden" name="op" value="atualizar">
            <input type="submit" value="Novo">
        </form>
    </section>