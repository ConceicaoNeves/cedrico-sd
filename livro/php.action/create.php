<?php

include_once 'connect-bd.php';

//clear
function clear($input) {
    global $connect;
    //sql
    $var = mysqli_escape_string($connect,$input);
    //xss
    $var = htmlspecialchars($var);

    return $var;
}
if(isset($_POST['btn-cadastrar'])):
    $titulo = mysqli_escape_string($connect, $_POST['titulo']);
    $anoPublicacao = mysqli_escape_string($connect, $_POST['anoPublicacao']);
    $edicao = mysqli_escape_string($connect, $_POST['edicao']);
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);
    $idAutor = mysqli_escape_string($connect, $_POST['idAutor']);
    $genero = mysqli_escape_string($connect, $_POST['genero']);
    $preco = mysqli_escape_string($connect, $_POST['preco']);
    $idLivro = mysqli_escape_string($connect, $_POST['idLivro']);

    if(empty($titulo) or empty($preco) or empty($idEditora) or empty($idAutor)):
        $_SESSION['mensagem'] = "Cadastro de {$idLivro} não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:

        $sql = "INSERT INTO livro (titulo, anoPublicacao, edicao, idEditora, idAutor, genero, preco) VALUES ('$titulo', '$anoPublicacao', '$edicao', '$idEditora', '$idAutor', '$genero', '$preco')";

        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Cadastro não realizado!";
            header('Location: ../index.php');
            
        endif;
    endif;
endif;