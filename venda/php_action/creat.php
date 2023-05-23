<?php
//conexão
require_once 'connect.php';

//clear
function clear($input)
{
    global $connect;
    //sql
    $var = mysqli_escape_string($connect, $input);
    //xss
    $var = htmlspecialchars($var);

    return $var;
}


if (isset($_POST['btn-registrarnovavenda'])) :
    $idLivro = ($_POST['idLivro']);
    $preco = clear(floatval($_POST['preco']));
    $quantidade = $_POST['quantidade'];
    $total = $_POST['total'];
    $totalFinal = $_POST['totalFinal'];
    $dataVenda = clear($_POST['dataVenda']);
    $totalFinal = 0;


    if (empty($idLivro) or empty($preco) or empty($dataVenda)) :
        //$_SESSION['mensagem'] = "Venda não realizado!! Campos preenchidos incorretamente!";
        header('Location: ../index.php');
    else :
        $sql = "INSERT INTO venda (dataVenda, totalFinal) VALUES ('$dataVenda', '$totalFinal')";

        if (mysqli_query($connect, $sql)) :
            $idVenda = mysqli_fetch_row(mysqli_query($connect, "SELECT MAX(idVenda) FROM venda"))[0];
            for($i=0; $i < count($idLivro); $i++) {
                $sql2 = "INSERT INTO livro_venda (idLivro, idVenda, preco, quantidade, total) VALUES ($idLivro[$i], $idVenda, '$preco[$i]', '$quantidade[$i]', '$total[$i]')";
                $totalFinal+=$total[$i];
                mysqli_query($connect, $sql2);

            }
            $sql3 = "UPDATE venda SET totalFinal = '$totalFinal' WHERE idVenda = '$idVenda'";
            mysqli_query($connect, $sql3);

            // $_SESSION['mensagem'] = "Venda registrada!";
            header('Location: ../index.php');
        else :
            //  $_SESSION['mensagem'] = "Venda não registrada!";
            header('Location: ../index.php');
        endif;

    endif;

endif;
