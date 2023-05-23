<?php 
//conexao co o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "cedrico1";

$conn = new MySQLi($servername, $username, $password, $db_name);


    session_start();
    $_SESSION["log"] = false;
?>