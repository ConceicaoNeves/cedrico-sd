<?php 
//conexao co o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "cedrico1";

$connect = mysqli_connect($servername, $username, $password, $db_name);
mysqli_set_charset($connect, "utf8");
if(mysqli_connect_error()):
    echo "Falha na Conexão: ".mysqli_connect_error();
endif;