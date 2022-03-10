<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/vaga.css" rel="stylesheet" type="text/css">
    <title>JOBS | Vaga</title>
</head>
<body>
    <?php
        require_once('layout/header.php');
    ?>
    <section>
        <div class="vaga">
            <section class="titulos">
                <h1>Informações sobre a vaga</h1>
                <h3>Programador web</h3>
                <p>(REMOTO)</p>
            </section>
            <section class="descricao">
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
            </section>

            <table>
                <tr>
                    <th>Requisitos</th>
                </tr>
                <tr>
                    <td>Estar diposto a aprender</td>
                </tr>
                <tr>
                    <td>Comunicação</td>
                </tr>
                <tr>
                    <td>Ingles Tecnico</td>
                </tr>
                    <td>TDD</td>
                <tr>
                    <td>Noçoes de NGINX</td>
                </tr>
                <tr>
                    <td>Interesse em aprender</td>
                </tr>
            </table>

            <section class="gpbtn">
                <input type="button" value="INSCREVER" class="button btninscrever">
                <form action="#">
                    <p>Ou voce pode anexar seu curriculo direto para analise.</p>
                    <label for='selecao-arquivo'>Selecionar um arquivo &#187;</label>
                    <input type="file" id="myFile" name="selecao-arquivo" class="button">
                    <input type="submit" class="button">
                  </form>
            </section>
        </div>
    </section>
    <footer>
        <section>
            Desenvolvido por:
            <br>
            <a href="https://github.com/leonardohuttner">Leonardo Huttner</a>
            <br>
            <a href="https://github.com/MaicoBaum">Maico Baum</a>
        </section>
    </footer>
</body>
</html>