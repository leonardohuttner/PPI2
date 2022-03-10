
<div class="toolbar">
    <nav>
      <a href="index.php">Inicio</a>
      <a href="perfil.php">Perfil</a>
      <a href="app/controller/sessoes.php?operacao=logout">Logout</a>
      <a class="button login" style="background-color:green;">
        <?php
        echo($_SESSION['nome']);?>
      </a>
    </nav>
    <div class="search-combo">
      <input type="text" id="busca" name="busca" placeholder="Digite uma area" required class="search" />
      <input type="button" value="Buscar" class="button btsearch">
  </div>
</div>