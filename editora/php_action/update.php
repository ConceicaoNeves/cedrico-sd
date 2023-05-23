<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-editar'])):
    $nomeEditora = mysqli_escape_string ($connect, $_POST['nomeEditora']);
    $telefone = mysqli_escape_string ($connect, $_POST['telefone']);
    $cidade = mysqli_escape_string ($connect, $_POST['cidade']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);
    $sql = "UPDATE editora SET nomeEditora='$nomeEditora', telefone = '$telefone', cidade = '$cidade', email = '$email' WHERE idEditora = '$idEditora'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('Location: ../index.php'); //voltar para a tela de index
        
    endif;
endif;