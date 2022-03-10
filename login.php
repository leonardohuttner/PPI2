<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="CSS/login.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="JS/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS | Login</title>
</head>
<body>
    <div class="container">
        <h1>Login:</h1>
        <form name="form-login" method="post" action="app/controller/sessoes.php">
            <input type="text" id="input-usuario" name="usuario" placeholder="Usuario" autocomplete="off"/>
            <br />
            <input type="password" id="input-senha" name="senha" placeholder="Senha"/>
            <br />
            <input type="hidden" name="operacao" value="login">
            <input type="submit" value="Enviar" class="submitbtn" />
            <p id="msgUsr"></p>
            <div>
                <p>Não tem uma conta? <a href="">Registre-se aqui</a></p>
            </div>
            <div>
                <p><a href="">Esqueci minha senha</a></p>
            </div>
            <div class="erro">
                <?php
                    if(isset($_GET['erro'])){
                      if ($_GET['erro'] == 1) echo('Todos campos obrigatorios!');
                      if ($_GET['erro'] == 2) echo('Usuario ou senha incorretos!');
                      if ($_GET['erro'] == 3) echo('Usuario sem permissão ou login expirado!');
                      if ($_GET['erro'] == 4) echo('Usuario deslogado com sucesso!');
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
