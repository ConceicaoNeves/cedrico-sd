<?php
session_start();
include_once '../php.action/connect-bd.php';

if(isset($_POST['btn-deletar'])):
    
    $idLivro = mysqli_escape_string($connect, $_POST['idLivro']);

    $sql = "DELETE FROM livro  WHERE idLivro = '$idLivro'";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar!";
        header('Location: ../index.php');
        
    endif;
endif;