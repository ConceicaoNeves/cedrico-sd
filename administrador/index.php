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
        <title>Livro</title>
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
                <h4>Administrador</h4>
                <table>
                    <thread>
                        <tr>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM administrador";
                        $resultado = mysqli_query($connect, $sql);
                        if(mysqli_num_rows($resultado)>0):   
                        while($dados = mysqli_fetch_array($resultado)):
                        ?>
                        <tr>
                            <td><?php echo $dados['nomeAdmin']; ?></td>
                            <td><?php echo $dados['sobrenomeAdmin']; ?></td>
                            <td><a href="editar.php?idAdmin=<?php echo $dados['idAdmin']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td> 
                        </tr>
                        <?php 
                        endwhile;
                        else: ?>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php 
                        endif;
                        ?>
                    </tbody>
                </table> 
            </form>  
        </div>     
    </body>
</html>
<?php
//Footer
include_once 'includes/footer.php';
?>