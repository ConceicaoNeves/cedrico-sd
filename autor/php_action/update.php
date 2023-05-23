<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-editar'])):
    $nomeAutor = mysqli_escape_string ($connect, $_POST['nomeAutor']);
    $sobrenomeAutor = mysqli_escape_string ($connect, $_POST['sobrenomeAutor']);
    $dataNascimento = mysqli_escape_string ($connect, $_POST['dataNascimento']);
    $dataMorte = mysqli_escape_string ($connect, $_POST['dataMorte']);
    $nacionalidade = mysqli_escape_string ($connect, $_POST['nacionalidade']);
    
    $idAutor = mysqli_escape_string($connect, $_POST['idAutor']);
    $sql = "UPDATE autor SET nomeAutor='$nomeAutor', sobrenomeAutor='$sobrenomeAutor', dataNascimento = '$dataNascimento', dataMorte = '$dataMorte', nacionalidade = '$nacionalidade' WHERE idAutor = '$idAutor'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('Location: ../index.php'); //voltar para a tela de index
        
    endif;
endif;