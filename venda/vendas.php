<?php
  session_start();
  if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <link rel="stylesheet" href="../assets/css/vendas.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width" />
        <title>Vendas</title>
    </head>
    <body>
        <header>
            <a href="../home.php">Voltar</a>
            <ul>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </header>
        <section>
            <a href="adicionar.php">
                <img src="../assets/icons/carrinho.png" alt="" />
                <p>Cadastrar Vendas</p>
            </a>
            <a href="index.php">
                <img src="../assets/icons/listar.png" alt="" />
                <p>Visualizar Vendas</p>
            </a>
            </header>
        </section>
        <footer>
            <p>Desenvolvido por RUBIK</p>
        </footer>
    </body>
</html>