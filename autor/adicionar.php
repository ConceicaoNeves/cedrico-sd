<?php
//Header

session_start();
if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

?> 
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Cadastrar Autor</title>
  </head>
  <body>
    <header>
      <a href="../autor/index.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="php_action/create.php" method="POST">
        <h1>CADASTRAR AUTOR</h1>
        <div class="input-text">
          <label for="nome">Nome:</label>
          <input class="validate" type="text" name="nomeAutor" id="nomeAutor">
        </div>
        <div class="input-text">
          <label for="sobrenome">Sobrenome:</label>
          <input type="text" class="validate" type="text" name="sobrenomeAutor" id="sobrenomeAutor">
        </div>
        <div class="input-text">
          <label for="dataNascimento">Data nascimento:</label>
          <input class="validate" type="date" name="dataNascimento" id="dataNascimento">
        </div>
        <div class="input-text">
          <label for="dataMorte">Data de Falecimento:</label>
          <input class="validate" type="date" name="dataMorte" id="dataMorte">
        </div>
        <div class="input-text">
          <label for="nacionalidade">Nacionalidade:</label>
          <input class="validate" type="text" name="nacionalidade" id="nacionalidade">
        </div>
        <input name="btn-cadastrar" type="submit" value="CADASTRAR" />
      </form>
    </div>
  </body>
</html>