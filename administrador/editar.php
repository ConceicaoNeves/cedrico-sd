<?php
//Header
include_once 'php_action/bdconnect.php';

session_start();
if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

if (isset($_GET['idAdmin'])):
    $idAdmin = mysqli_escape_string($connect, $_GET['idAdmin']);
    $sql = "SELECT * FROM administrador WHERE idAdmin ='$idAdmin'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?> 
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Editar Administrador</title>
  </head>
  <body>
    <header>
      <a href="../administrador/index.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="php_action/update.php" method="POST">
        <h1>EDITAR ADMINISTRADOR</h1>
        <div class="input-text">
        <input type= "hidden" name = "idAdmin" value="<?php echo $dados['idAdmin'];?>">
          <label for="nomeAdmin">Nome:</label>
          <input type="text" name="nomeAdmin" id="nomeAdmin" value="<?php echo $dados['nomeAdmin'];?>">
        </div>
        <div class="input-text">
          <label for="sobrenomeAdmin">Sobrenome:</label>
          <input type="text" name="sobrenomeAdmin" id="sobrenomeAdmin" value="<?php echo $dados['sobrenomeAdmin'];?>">
        </div>
        <div class="input-text">
          <label for="login">Login:</label>
          <input type="text" name="login" id="login" value="<?php echo $dados['login'];?>">
          </div>
        <div class="input-text">
          <label for="sobrenomeAdmin">Senha:</label>
          <input type="password" name="senha" id="senha" value="<?php echo MD5($dados['senha']);?>">
        </div>
        <input type="submit" name="btn-editar" value="EDITAR"/>
      </form>
    </div>
  </body>
</html> 