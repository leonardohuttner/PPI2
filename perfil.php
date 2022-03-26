<!DOCTYPE html>
<?php
session_start();
if (!$_SESSION['logado']) {
  header('Location: login.php?erro=3');
}
require_once('app/entities/Vaga.php');
$vaga = new Vaga();
$vagas = $vaga->atualizar();
?>


<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="CSS/perfil.css" rel="stylesheet" type="text/css">
  <title>JOBS | Perfil</title>
</head>

<body>
  <?php
  require_once('layout/header_logado.php');
  ?>

  <div class="container">
    <div class="perfil">
      <section class="grid-0">
        <h1>Perfil:</h1>
      </section>
      <section class="grid-1">
        <p> Nome:
          <?php
          echo ($_SESSION['nome']); ?>
        </p>
        <p>Email:
          <?php
          echo ($_SESSION['email']); ?>
        </p>
        <p>Ecolaridade: Estudante TADS6</p>
        <p>Interesse: FullStack</p>
        <input type="button" value="Alterar senha" class="button trocasenha">
      </section>
      <section class="grid-2">
        <img src="img/perfil.png" alt="Imagem perfil usuario">
        <label for='selecao-arquivo'>Alterar Foto do perfil &#187;</label>
        <input type="file" id="myFile" name="selecao-arquivo" class="button">
      </section>
    </div>

    <div class="informacoes">
      <h1>Aguardando resultados</h1>
      <table>
        <thead>
          <tr class="tbhead">
            <th>Vaga</th>
            <th>Resultado</th>
            <th>OBS</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Programador Web</td>
            <td>Aguardando</td>
            <td>
              <input type="button" value="Enviar email">
            </td>
          </tr>
          <tr>
            <td>Programador JAVA</td>
            <td>Aprovado</td>
            <td>
              <input type="button" value="Agendar entrevista">
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</body>

</html>