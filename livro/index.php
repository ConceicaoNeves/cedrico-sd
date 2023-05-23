<?php 
//header
include 'php.action/connect-bd.php';
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
                <h4>Livros</h4>
                <table>
                    <br>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Preço</th>
                            <th>Publicação</th>
                            <th>Edição</th>
                            <th>Editora</th>
                            <th>Autor</th>
                            <th>Gênero</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT *, e.nomeEditora, a.nomeAutor FROM livro INNER JOIN editora as e on livro.idEditora=e.idEditora INNER JOIN autor as a on livro.idAutor=a.idAutor ";
                        $resultado = mysqli_query($connect, $sql);

                        if(mysqli_num_rows($resultado) > 0):
                            while($dados = mysqli_fetch_array($resultado)):
                                $dados['anoPublicacao'] = strtotime($dados['anoPublicacao'])
                            ?>
                                <tr>
                                    <td><?php echo $dados['titulo']; ?></td>
                                    <td><?php echo $dados['preco']; ?></td>
                                    <td><?php echo date('Y', $dados['anoPublicacao']); ?></td>
                                    <td><?php echo $dados['edicao']; ?></td>
                                    <td><?php echo $dados['nomeEditora']; ?></td>
                                    <td><?php echo $dados['nomeAutor']; ?></td>
                                    <td><?php echo $dados['genero']; ?></td>
                                    <td><a href="editar-livro.php?idLivro=<?php echo $dados['idLivro']; ?>" class="btn-floating  light-green"><i class="material-icons">edit</i></a></td>
                                    <td><a href="#modal<?php echo $dados['idLivro']; ?>" class ="btn-floating red lighten-1 modal-trigger"><i class ="material-icons">delete</i></a></td>
                                    
                            
                                    <!-- Modal Structure -->
                                    <div id="modal<?php echo $dados['idLivro']; ?>" class="modal">
                                        <div class="modal-content">
                                        <h4>Tem certeza que deseja excluir esse Livro?</h4>
                                        <p>A operação não poderá ser desfeita.</p>
                                        </div>
                                        <div class="modal-footer">
                                        
                                        <form action="../livro/php.action/delete-livro.php" method="POST">
                                            <input type="hidden" name="idLivro" value="<?php echo $dados['idLivro']; ?>">
                                            <button type="submit" name="btn-deletar" class="btn green lighten-1">Sim, tenho certeza!</button>
                                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                        </form>
                                    </div>
                                    </div>
                                    
                                </tr>
                            <?php endwhile;
                            else: ?>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>

                            </tr> 
                        <?php
                        endif;
                        ?>
                    </tbody>  
                </table>
                <a href="adicionar.php" type="submit">NOVO LIVRO</a>
            </form>
        </div> 
    </body>
</html>
<?php
//Footer
include_once 'includes/footer.php';
?>
    