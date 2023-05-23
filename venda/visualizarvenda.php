<?php
//Header
include('../venda/php_action/connect.php');
include_once 'includes/header.php';

session_start();
if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

if (isset($_GET['idVenda'])):
    $idVenda = mysqli_escape_string($connect, $_GET['idVenda']);
    $sql = "SELECT * FROM venda WHERE idVenda ='$idVenda'";
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
                    <th>Cod</th>
                    <th>Livro</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
            </thread>
            <tbody>
                <?php
            
                    $sql2 = "SELECT *, livro.titulo FROM livro_venda
                    INNER JOIN livro ON livro.idLivro = livro_venda.idLivro
                    WHERE livro_venda.idVenda = '$idVenda'";
                    $result = mysqli_query($connect, $sql2);

                    if(mysqli_num_rows($result)>0):
                    while ($venda = mysqli_fetch_assoc($result)) {
                        //echo $livro[0];
                    ?>
                    <tr>
                        <td><?php echo $venda["idVenda"]; ?></td>
                        <td><?php echo $venda["idVL"]; ?></td>
                        <td><?php echo $venda["titulo"]; ?></td>
                        <td><?php echo $venda["preco"]; ?></td>
                        <td><?php echo $venda["quantidade"]; ?></td>
                        <td><?php echo $venda["total"]; ?></td>
                        
                    </tr>
                    <?php 
                    }
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
           </form>>
        </div> 
    </body>
</html>



<?php



?>