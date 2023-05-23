<?php
//Header
include_once '../livro/php.action/connect-bd.php';

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
    <title>Cadastrar Livro</title>
  </head>
  <body>
    <header>
      <a href="../livro/index.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card" action="../livro/php.action/create.php" method="POST">
        <h1>CADASTRAR LIVROS</h1>
        <div class="input-text">
          <label for="Titulo">Titulo:</label>
          <input type="text" name="titulo" id="titulo">
        </div>
        <div class="input-text">
          <label for="preco">Preço:</label>
          <input type="text" name="preco" id="preco">
        </div>
        <div class="input-text">
          <label for="anoPublicacao">Ano de Publicação:</label>
          <input type="date" name="anoPublicacao" id="anoPublicacao">
        </div>
        <div class="input-text">
          <label for="edicao">Edição:</label>
          <input type="number" name="edicao" id="edicao">
        </div>
        <div class="input-text">
          <label for="genero">Gênero:</label>
          <input type="text" name="genero" id="genero">
        </div>
        <div class="input-text">
        <select class="select" id="idAutor" name="idAutor">
        <option value="text" disabled selected>Escolha o Autor</option>
        <?php
            $sql="SELECT idAutor,idAutor, nomeAutor, nacionalidade
                from autor";
            $result=mysqli_query($connect,$sql);

            while ($autor=mysqli_fetch_row($result)):
                        ?>
                        <option value="<?php echo $autor[0] ?>"><?php echo $autor[1]." - ".$autor[2]." - ".$autor[3] ?></option>
                    <?php endwhile; ?>
            </select>
        </div>
        <div class="input-text">
        <select class="select" id="idEditora" name="idEditora">
          <option value="text" disabled selected>Escolha a Editora</option>
            <?php
            $sql="SELECT idEditora,idEditora, nomeEditora,cidade
            from editora";
              $result=mysqli_query($connect,$sql);

              while ($editora=mysqli_fetch_row($result)):
                    ?>
            <option value="<?php echo $editora[0] ?>"><?php echo $editora[1]." - ".$editora[2]." - ".$editora[3] ?></option>
            <?php endwhile; ?>
        </select>
        </div>
        <input type="submit" name="btn-cadastrar" value="CADASTRAR"/>
      </form>
    </div>
  </body>
</html>