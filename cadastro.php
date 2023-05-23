<?php
    session_start();
    if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <link rel="stylesheet" href="assets/css/cadastro.css" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width" />
        <title>Cadastro</title>
    </head>
    <body>
        <header>
            <a href="home.php">Voltar</a>
            <ul>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </header>
        <section>
            <a href="../livro/index.php">
                <img src="assets/icons/livro.png" alt="" />
                <p>Livro</p>
            </a>
            <a href="../autor/index.php">
                <img src="assets/icons/escritor3.png" alt="" />
                <p>Autor</p>
            </a>
            <a href="../editora/index.php">
                <img src="assets/icons/editora2.png" alt="" />
                <p>Editora</p>
            </a>
        </section>
        <footer>
            <p>Desenvolvido por RUBIK</p>
        </footer>
    </body>
</html>