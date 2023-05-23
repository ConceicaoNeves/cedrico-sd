<?php

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
    <title>Cadastrar Editora</title>
    </head>

    <body>
        <header>
            <a href="../editora/">Voltar</a>
            <ul>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
        </header>
        <div class="card-cadastro">
            <form class="card" action="../editora/php_action/create.php" method="POST">
            <h1>Nova Editora</h1>
                <div class="input-text">
                    <label for="nomeEditora">Nome</label>
                    <input type="text" name="nomeEditora" id="nomeEditora">
                    
                </div>
                <div class="input-text">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" id="telefone">
                    
                </div>
                <div class="input-text">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade">
                        
                </div>
                <div class="input-text">
                    <label for="alternate_email">Email</label>
                    <input type="email" name="email" id="email">
                        
                </div>
                <input type="submit" name="btn-cadastrar" value="CADASTRAR"/>
            </form>
        </div>
    </body>
</html>
<?php
//Footer
include_once 'includes/footer.php';
?>