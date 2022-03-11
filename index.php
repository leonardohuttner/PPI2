<!DOCTYPE php>
<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="CSS/index.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOBS | Pagina inicial</title>
</head>
<body>
   <?php
        require_once('layout/header.php');
    ?>

    <section class="cards">
        <h1>Jobs do momento:</h1>
        <div class="card">
            <h3 class="titulo">Programador web</h3>
            <span>(REMOTO)</span>
            <p>Aliquam sit amet sollicitudin velit.
                In eu turpis sit amet tellus ultricies luctus in ut leo.
                Nunc tempor quis nisl auctor varius. Ut molestie euismod
                tellus, a imperdiet neque cursus sed. Class aptent taciti
                sociosqu ad litora torquent per conubia nostra, per inceptos
                himenaeos. Etiam felis est, pellentesque eget turpis et
                ,iaculis semper nulla. Etiam lectus neque, interdum
                porttitor posuere et, molestie in erat. Nunc bibendum
                vestibulum arcu, non posuere ante mollis in. Suspendisse
                potenti. Duis ipsum arcu, mollis ut scelerisque nec,
                viverra sit amet justo.
            </p>
            <div class="gpBtn">
                <input type="button" value="Detalhes" class="button">
                <input type="button" value="Entrar em contato" class="button">
            </div>
        </div>

    </section>
    <footer>
        <section>
            Desenvolvido por:
            <br>
            <a href="https://github.com/leonardohuttner">Leonardo Huttner</a>
        </section>
    </footer>
</body>
</php>