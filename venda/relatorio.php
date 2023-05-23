<?php
  //Header
  include_once 'includes/header.php';
  include_once '../venda/php_action/connect.php';

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
    <title>Relatório</title>
  </head>

  <body>
    <header>
      <a href="vendas.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
      <form class="card">
        <h1>RELATÓRIO</h1>
        <div class="input-text">
          <label for="data-inicio">Data Inicio:</label>
          <input type="date" name="dataInicio" value="<?php if(isset($_GET['dataInicio'])) echo $_GET['dataInicio']; ?>">
        </div>
        <div class="input-text">
          <label for="data-final">Data final:</label>
          <input type="date" name="dataFinal" value="<?php if(isset($_GET['dataFinal'])) echo $_GET['dataFinal']; ?>">
        </div>
        <input type="submit" value="EMITIR RELATÓRIO" />
        <form class="card-list">
        <table class="striped">
            <tr>
                <th>idVenda</th>
                <th>idLivro</th>
                <th>Valor Venda</th>
                <th>Data</td>
            </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_GET['dataInicio']) && !isset($_GET['dataFinal'])) {
                    ?>
                <tr>
                    <td colspan="3">Digite algo para pesquisar...</td>
                </tr>
                <?php
                } else {
                $dataInicio = mysqli_escape_string($connect, $_GET['dataInicio']);
                $dataFinal = mysqli_escape_string($connect, $_GET['dataFinal']);
                $sql = "SELECT idVenda, dataVenda FROM venda WHERE dataVenda >= '$dataInicio' and dataVenda <= '$dataFinal' ORDER BY dataVenda;";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):
                    while($dados = mysqli_fetch_array($resultado)):
                        $dados['dataVenda'] = strtotime($dados['dataVenda'])
                    ?>
                        <tr>
                            <td><?php echo $dados['idVenda']; ?></td>
                            <td><?php //echo $dados['idLivro']; ?></td>
                            <td><?php //echo $dados['preco']; ?></td>
                            <td><?php echo date('d/m/Y', $dados['dataVenda']); ?></td>
                            <?php endwhile;
                    else: ?>
                    <tr>
                        <td colspan="4">Não foi possível emitir o relatório...</td>
                    </tr> 
                <?php
                endif;
            }
                ?>
            </tbody> 
        </table> 
      </form>
    </div>
  </body>
</html>
        