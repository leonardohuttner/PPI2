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
                if (isset($_GET['erro'])) {
                    if($_GET['erro'] == 2) echo '<p>ID inexistente para atualização</p>';
                    if($_GET['erro'] == 3) echo '<p>Vaga atualizada com sucesso!</p>';
                    if($_GET['erro'] == 4) echo '<p>ID para exclusão é inexistente</p>';
                    if($_GET['erro'] == 5) echo '<p>Vaga excluída com sucesso!</p>';
                    if($_GET['erro'] == 6) echo '<p>Vaga criada com sucesso!</p>';
                    if($_GET['erro'] == 7) echo '<p>Erro ao criar, verifique</p>';
                  }
                  ?>
        <section class="cards">
            <div class="card">
                <form action="nova-vaga.php?op=novo" method="post">
                    <input type="submit" value="Criar vaga" class="button">
                </form>
            </div>
        <?php 
            foreach($vagas as $vaga_bd) {?>
                    <div class="card">
                        <h3 class="titulo"><?=$vaga_bd->getTitulo();?></h3>
                        <span><?=$vaga_bd->getTipo();?></span>
                        <p><?=$vaga_bd->getDescricao();?></p>
                        <div class="gpBtn">
                            <form action="editar-vaga.php?op=editar&id=<?=$vaga_bd->getId();?>" method="post">
                                <input type="submit" value="Editar" class="button">
                                <input type="button" value="Entrar em contato" class="button">
                            </form>
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