<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-cadastrar'])):
    $nomeAutor = mysqli_escape_string ($connect, $_POST['nomeAutor']);
    $sobrenomeAutor = mysqli_escape_string ($connect, $_POST['sobrenomeAutor']);
    $dataNascimento = mysqli_escape_string ($connect, $_POST['dataNascimento']);
    $dataMorte = mysqli_escape_string ($connect, $_POST['dataMorte']);
    $nacionalidade = mysqli_escape_string ($connect, $_POST['nacionalidade']);

    if(empty($nomeAutor) or empty($sobrenomeAutor) or empty($nacionalidade)):
        $_SESSION['mensagem'] = "Cadastro de {$nomeAutor} não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:

        $sql = "INSERT INTO autor (nomeAutor, sobrenomeAutor, dataNascimento, dataMorte, nacionalidade) VALUES ('$nomeAutor', '$sobrenomeAutor', '$dataNascimento', '$dataMorte', '$nacionalidade')";
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastro de {$nomeAutor} realizado com sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Cadastro de {$nomeAutor} não realizado!";
            header('Location: ../index.php');
            
        endif;
    endif;
endif;