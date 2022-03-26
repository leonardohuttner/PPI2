<?php
session_start();//primeira linha do script sempre
error_reporting(E_ALL);
ini_set('display_erros',1);
require_once('app/entities/Post.php');
if(!isset($_SESSION['logado'])){
  header('Location: index.php?error=0');
  exit;
}
$post = new Post();
$postagens = $post->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="nome da empresa">
    <meta name="description" content="blog de tecnologia, tudo sobre programação (HTML não é programação)">
    <meta name="keywords" content="blog, tecnologia, programação">
    <title>Blog de Tecnologia</title>
    <!-- <link rel="stylesheet" href="assets/css/normalize.css" /> -->
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/blog.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
</head>
<body>
    <?php 
        require_once('layout/header.php');
        require_once('layout/menu.php');
    ?>
    <section>
        <h2>Gerenciamento de Notícias</h2>
        <?php
            if(isset($_GET['erro'])){
                if($_GET['erro'] == 2) echo '<p>ID inexistente para atualização</p>';
                if($_GET['erro'] == 3) echo '<p>Postagem atualizada com sucesso!</p>';
                if($_GET['erro'] == 4) echo '<p>ID para exclusão é inexistente</p>';
                if($_GET['erro'] == 5) echo '<p>Postagem excluída com sucesso!</p>';
            }	
        ?>
        <table>
        	<tr>
        		<th>ID</th>
        		<th>Data</th>
        		<th>Titulo</th>
        		<th>Autor</th>
        		<th>Operações</th>
        	</tr>
        	
		<?php
			foreach($postagens as $noticia){ ?>
				<tr>
					<td><?=$noticia->getId();?></th>
					<td><?=$noticia->getData();?></td>
					<td><?=$noticia->getTitulo();?></td>
					<td><?=$noticia->getAutor();?></td>
					<td>
						<a href="#">Ver</a>
						<a href="app/controllers/admin-post.php?op=editar&id=<?=$noticia->getId();?>">Editar</a>
						<a href="app/controllers/admin-post.php?op=excluir&id=<?=$noticia->getId();?>">Excluir</a>
					</td>
				</tr>
	<?php	}
		?>
        </table>
    </section>
    <?php require_once('layout/footer.php'); ?>
</body>
</html>
