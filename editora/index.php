<?php
include_once 'php_action/bdconnect.php';
include_once 'includes/header.php';

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
    <title>Editora</title>
  </head>
  <body>
    <header>
      <a href="../cadastro.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card-list">
        <h4>Editora</h4>
        <table>
          <thread>
              <tr>
              <th>Identificador</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Cidade</th>
                  <th>Email</th>
                  
              </tr>
          </thread>
          <tbody>
            <?php
            $sql = "SELECT * FROM editora";
            $resultado = mysqli_query($connect, $sql);
            if(mysqli_num_rows($resultado)>0):
              while($dados = mysqli_fetch_array($resultado)):
              ?>
              <tr>
                <td><?php echo $dados['idEditora']; ?></td>
                <td><?php echo $dados['nomeEditora']; ?></td>
                <td><?php echo $dados['telefone']; ?></td>
                <td><?php echo $dados['cidade']; ?></td>
                <td><?php echo $dados['email']; ?></td>
                <td><a href="editar.php?idEditora=<?php echo $dados['idEditora']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td>
                
                <td><a href="#modal<?php echo $dados['idEditora']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                  <div id="modal<?php echo $dados['idEditora']; ?>" class="modal">
                    <div class="modal-content">
                      <h4>Tem certeza que deseja excluir esse editora?</h4>
                      <p>A operação não poderá ser desfeita.</p>
                    </div>
                    <div class="modal-footer">
                      <form action="../editora/php_action/delete.php" method="POST">
                        <input type="hidden" name="idEditora" value="<?php echo $dados['idEditora']; ?>">
                        <button type="submit" name="btn-deletar" class="btn green lighten-1">Sim, tenho certeza!</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                      </form>
                    </div>
                  </div>
                </tr>
              <?php endwhile;
            else: ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <?php 
            endif;
            ?>
          </tbody>
        </table>
        <a href="adicionar.php" type="submit">NOVA EDITORA</a>
      </form>
    </div>
  </body>
</html>
<?php
//Footer
include_once 'includes/footer.php';
?>
