<?php
session_start();
require_once '../php.action/connect-bd.php';

if(isset($_POST['btn-editar'])):
    $idLivro = mysqli_escape_string($connect, $_POST['idLivro']);
    $titulo = mysqli_escape_string($connect, $_POST['titulo']);
    $anoPublicacao = mysqli_escape_string($connect, $_POST['anoPublicacao']);
    $edicao = mysqli_escape_string($connect, $_POST['edicao']);
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);
    $idAutor = mysqli_escape_string($connect, $_POST['idAutor']);
    $genero = mysqli_escape_string($connect, $_POST['genero']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);


        $sql = "UPDATE livro SET titulo='$titulo', anoPublicacao='$anoPublicacao', edicao='$edicao', idEditora = '$idEditora', idAutor = '$idAutor', genero = '$genero', preco = '$preco' WHERE idLivro = '$idLivro'";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../index.php');
            
        endif;
    
endif;