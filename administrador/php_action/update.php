<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-editar'])):
    $nomeAdmin = mysqli_escape_string ($connect, $_POST['nomeAdmin']);
    $sobrenomeAdmin = mysqli_escape_string($connect, $_POST['sobrenomeAdmin']);
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha = mysqli_escape_string($connect, $_POST['senha']);

    $idAdmin = mysqli_escape_string($connect, $_POST['idAdmin']);
    $sql = "UPDATE administrador SET nomeAdmin='$nomeAdmin', sobrenomeAdmin = '$sobrenomeAdmin', login = '$login', senha = '$senha' WHERE idAdmin = '$idAdmin'";
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('Location: ../index.php'); //voltar para a tela de index
            
    endif;
endif;