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
    <title>Autores</title>
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
            <h4>Autores</h4>
            <table>
                <thread>
                    <tr>
                        <th>Identificador</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Nascimento</th>
                        <th>Morte</th>
                        <th>Nacionalidade</th>
                    </tr>
                </thread>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM autor";
                    $resultado = mysqli_query($connect, $sql);
                    if(mysqli_num_rows($resultado)>0):
                        while($dados = mysqli_fetch_array($resultado)):
                            $dados['dataNascimento'] = strtotime($dados['dataNascimento']);
                            $dados['dataMorte'] = strtotime($dados['dataMorte'])
                        ?>
                        
                        <tr>
                            <td><?php echo $dados['idAutor']; ?></td>
                            <td><?php echo $dados['nomeAutor']; ?></td>
                            <td><?php echo $dados['sobrenomeAutor']; ?></td>
                            <td><?php echo date('d/m/Y', $dados['dataNascimento']);?></td>
                            <td><?php echo date('d/m/Y', $dados['dataMorte']);?></td>
                            <td><?php echo $dados['nacionalidade']; ?></td>
                            <td><a href="editar.php?idAutor=<?php echo $dados['idAutor']; ?>" class ="btn-floating light-green"><i class ="material-icons">edit</i></a></td>
                            
                            <td><a href="#modal<?php echo $dados['idAutor']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                        
                            <!-- Modal Structure -->
                            <div id="modal<?php echo $dados['idAutor']; ?>" class="modal">
                                <div class="modal-content">
                                <h4>Tem certeza que deseja excluir esse autor?</h4>
                                <p>A operação não poderá ser desfeita.</p>
                                </div>
                                <div class="modal-footer">
                                
                                <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="idAutor" value="<?php echo $dados['idAutor']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn green lighten-1">Sim, tenho certeza!</button>
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>
                            </div>
                            </div>
                        </tr>
                        <?php 
                        endwhile;
                    else: ?>
                    <tr>
                        <td></td>
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
            <a href="adicionar.php" type="submit">Adicionar Autor </a>
            </form>
        </div>
    </body>
</html>
<?php
//Footer
include_once 'includes/footer.php';
?>
