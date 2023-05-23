<?php
    include("bdconnect.php");

    $login = $_REQUEST["login"];

    $sql = "SELECT idAdmin FROM administrador WHERE login='$login'";

    $res = $conn->query($sql);

    if(!$res)   print "<script>alert('Como?')</script>";


    $row = $res->fetch_object();


    $_SESSION["log"] = $row->idAmin;
            $echo = $_SESSION["log"];
           echo "$echo";

    print "<script>location.href='index.php?page=retorno';</script>";
?>