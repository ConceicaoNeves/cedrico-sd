<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-deletar'])):
    $idAutor = mysqli_escape_string($connect, $_POST['idAutor']);

    $sql = "DELETE FROM autor WHERE idAutor ='$idAutor'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar!";
        header('Location: ../index.php'); //voltar para a tela de index
        
    endif;
endif;