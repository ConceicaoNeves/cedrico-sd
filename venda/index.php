<?php
//Header
include('bdconnect.php');
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
    <title>Livro</title>
</head>
    <body>
    <header>
      <a href="vendas.php">Voltar</a>
      <ul>
        <li><a href="../logout.php">Sair</a></li>
      </ul>
    </header>
    <div class="card-cadastro">
        <form class="card-list">
        <h4>Vendas</h4>
        <table class ="striped">
            <thread>
                <tr>
                    <th>idVenda</th>
                    <th>Data</th>  
                    <th>Total</th>
                    <th></th>  
                </tr>
            </thread>
            <tbody>
                <?php
                $sql = "SELECT * FROM venda";
                $resultado = mysqli_query($connect, $sql);
                
                if(mysqli_num_rows($resultado)>0):
                    while($dados = mysqli_fetch_array($resultado)):
                        $dados['dataVenda'] = strtotime($dados['dataVenda'])
                    ?>
                    <tr>
                        <td><?php echo $dados["idVenda"]; ?></td>
                        <td><?php echo date('d/m/Y', $dados['dataVenda']); ?></td>
                        <td><?php echo  $dados['totalFinal']; ?></td>
                        <td><a href="visualizarvenda.php?idVenda=<?php echo $dados['idVenda']; ?>" class ="btn-floating light-green"><i class ="material-icons">assignment</i></a></td>
                        
                    </tr>
                    <?php 
                    endwhile;
                else: ?>
                <tr>
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
                <a type="submit" href="adicionar.php">NOVA VENDA</a>
           </form>
        </div> 
    </body>
</html>