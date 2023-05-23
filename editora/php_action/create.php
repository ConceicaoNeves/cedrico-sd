<?php 
//conexão
session_start();
require_once 'bdconnect.php';

if(isset($_POST['btn-cadastrar'])):
    $nomeEditora = mysqli_escape_string ($connect, $_POST['nomeEditora']);
    $telefone = mysqli_escape_string ($connect, $_POST['telefone']);
    $cidade = mysqli_escape_string ($connect, $_POST['cidade']);
    $email = mysqli_escape_string($connect, $_POST['email']);

    if(empty($nomeEditora) or empty($email) or empty($cidade)):
        $_SESSION['mensagem'] = "Cadastro de {$nomeEditora} não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else:

        $sql = "INSERT INTO editora (nomeEditora, telefone, cidade, email) VALUES ('$nomeEditora', '$telefone', '$cidade', '$email')";
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Cadastro de {$nomeEditora} realizado com sucesso!";
            header('Location: ../index.php');
        else:
            $_SESSION['mensagem'] = "Cadastro de {$nomeEditora} não realizado!";
            header('Location: ../index.php');
            
        endif;
    endif;
endif;