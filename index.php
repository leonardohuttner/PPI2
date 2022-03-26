<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="CSS/index.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JOBS | Pagina inicial</title>
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
                $vaga = new Vaga();
                $vagas = $vaga->listar();
        ?>
        <section class="cards">
        <?php 
            foreach($vagas as $vaga_bd) {?>
                    <div class="card">
                        <h1><?=$vaga_bd->getTitulo();?></h1>
                        <h3 class="titulo"><?=$vaga_bd->getTitulo();?></h3>
                        <span><?=$vaga_bd->getTipo();?></span>
                        <p><?=$vaga_bd->getDescricao();?></p>
                        <div class="gpBtn">
                            <input type="button" value="Editar" class="button">
                            <input type="button" value="Entrar em contato" class="button">
                        </div>
                    </div>
                        <?php }
                ?>
                </section>
            <footer>
                <section>
                    Desenvolvido por:
                    <br>
                    <a href="https://github.com/leonardohuttner">Leonardo Huttner</a>
                </section>
            </footer>
    </body>
</html>