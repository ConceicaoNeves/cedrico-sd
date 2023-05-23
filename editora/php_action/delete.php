<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-deletar'])):
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);

    $sql = "DELETE FROM editora WHERE idEditora ='$idEditora'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao deletar!";
        header('Location: ../index.php'); //voltar para a tela de index
        
    endif;
endif;