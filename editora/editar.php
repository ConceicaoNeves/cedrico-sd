<?php
//Header
include_once 'php_action/bdconnect.php';

session_start();
if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

if (isset($_GET['idEditora'])):
    $idEditora = mysqli_escape_string($connect, $_GET['idEditora']);
    $sql = "SELECT * FROM editora WHERE idEditora ='$idEditora'";
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
    <title>Editar Editora</title>
  </head>
  <body>
    <header>
      <a href="../editora">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="php_action/update.php" method="POST">
        <h1>Editar Editora</h1>    
        <div class="input-text">
          <input type= "hidden" name = "idEditora" value="<?php echo $dados['idEditora'];?>">
          <label for="nomeEditora">Nome</label>
          <input type="text" name="nomeEditora" id="nomeEditora"  value="<?php echo $dados['nomeEditora'];?>">   
        </div>
        <div class="input-text">
          <label for="telefone">Telefone</label>
          <input type="tel" name="telefone" id="telefone" value="<?php echo $dados['telefone'];?>">  
        </div>
        <div class="input-text">
          <label for="cidade">Cidade</label>
          <input class="validate" type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade'];?>">
        </div>
        <div class="input-text">
          <label for="email">Email</label>    
          <input type="email" name="email" id="email" value="<?php echo $dados['email'];?>">
        </div>
        <input type="submit" name="btn-editar" value="EDITAR">
      </form>
    </div>
  </body>
</html>
