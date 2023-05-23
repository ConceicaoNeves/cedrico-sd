<?php
  session_start();
  if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="assets/css/index.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Home</title>
  </head>
  <body>
    <header>
      <ul>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </header>
    <section>
      <a href="cadastro.php">
        <img src="assets/icons/livraria.png" alt="" />
        <p>Livraria</p>
      </a>
      <a href="/venda/vendas.php">
        <img src="assets/icons/carrinho.png" alt="" />
        <p>Vendas</p>
      </a>
      <a href="/venda/relatorio.php">
        <img src="assets/icons/relatorio4.png" alt="" />
        <p>Relatório</p>
      </a>
      <a href="/administrador/index.php">
        <img src="assets/icons/adm.png" alt="" />
        <p>Administrador</p>
      </a>
    </section>
    <footer>
        <p>Desenvolvido por RUBIK</p>
    </footer>
  </body>
</html>
