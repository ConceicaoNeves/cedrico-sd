<!--
  session_start();
  if($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";
  print "<h1>.".$_SESSION["log"]."</h1>";
 -->
<?php
include("bdconnect.php");

    if(isset($_POST["ENTRAR"])){
        $login = $_POST["login"];

        $sql = "SELECT senha, idAdmin FROM administrador WHERE login='$login'";

        $res = $conn->query($sql);

        if(!$res){
            print "<script>alert('Usuario não encontrado')</script>";
           return;
        }

        $row = $res->fetch_object();
        
        if($row->senha != $_POST["pass"]){
            print "<script>alert('Senha incorreta')</script>";
            print "<script>location.href='index.php';</script>";
        }
        else    $_SESSION["log"] = $row->idAdmin;

        print "<script>location.href='home.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="assets/css/login.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <title>Login</title>
  </head>
  <body>
    <div class="image-login">
      <img src="assets/img/Bibliophile-bro.svg" alt="" />
    </div>
    <div class="card-login">
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo $erro;
            endforeach;
        endif;
    ?>
    <form class="card" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h1>LOGIN</h1>
        <div class="input-text">
          <label for="login">Login:</label>
          <input type="text" id="login"  name="login"/>
        </div>
        <div class="input-text">
          <label for="password">Senha:</label>
          <input type="password" id="password" name="pass" />
        </div>
        <input type="submit" value="ENTRAR" name="ENTRAR"/>

      </form>
    </div>
  </body>
</html>
