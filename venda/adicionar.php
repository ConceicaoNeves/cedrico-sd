<?php
//Header
include('bdconnect.php');

session_start();
if ($_SESSION["log"] == false) print "<script>location.href='index.php';</script>";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="../assets/css/cad-padrao.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width" />
  <title>Cadastrar Venda</title>
</head>

<body>
  <header>
    <a href="../venda/vendas">Voltar</a>
    <ul>
      <li><a href="../logout.php">Sair</a></li>
    </ul>
  </header>
  <div class="card-cadastro">
    <form class="card" action="../venda/php_action/creat.php" method="POST">
      <h1>CADASTRAR VENDA</h1>
      <div class="input-text">
        <div class="novoProduto">
          <div id="service">

            <input type="hidden" id="idLivro" name="idLivro[]" value="">

            <div class="input-text">
              <label for="preco">Livro:</label>
              <select id="preco" name="preco[]" onchange="calculateTotal('preco', 'quantidade', 'total'), atualizaIdLivro('preco', 'idLivro')">
                <option value="text">Preço</option>
                <?php
                $sql = "SELECT preco, idLivro, titulo FROM livro";
                $result = mysqli_query($connect, $sql);

                while ($valor = mysqli_fetch_row($result)) :
                ?>
                  <option value="<?php echo $valor[0] ?>" data-id="<?php echo $valor[1] ?>"><?php echo $valor[2] . " - " . $valor[0] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="input-text">
              <label for="quantidade">Quantidade:</label>
              <input type="text" name="quantidade[]" id="quantidade" onchange="calculateTotal('preco', 'quantidade', 'total')">
            </div>
            <div class="input-text">
              <label for="total">Total:</label>
              <input type="text" name="total[]" id="total" readonly>
            </div>

          </div>
        </div>
        <button onclick="serviceAddFields()">ADICIONAR LIVRO</button>
        
        <div class="input-text">
          <label for="dataVenda">Data:</label>
          <input class="validate" type="date" name="dataVenda" id="dataVenda">
        </div>
        
        <div class="input-text">
          <label for="totalFinal">Total Final:</label>
          <input type="text" name="totalFinal" id="totalFinal" readonly>
        </div>
        <input type="submit" name="btn-registrarnovavenda" value="CADASTRAR" />
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      let contador = 1

      let servicesConteiner = document.querySelector(".novoProduto");
      let service = document.querySelector("#service")

      function serviceAddFields() {
        event.preventDefault()
        let elementos = $('#service').clone()

        var idLivro = "idLivro" + contador
        var idPreco = "preco" + contador
        var idQuantidade = "quantidade" + contador
        var idTotal = "total" + contador
        elementos.find('#idLivro').attr('id', idLivro)
        elementos.find('#preco').attr('id', idPreco)
        // elementos.find('#preco').attr('onchange', "")
        elementos.find('#' + idPreco).attr('onchange', "calculateTotal('" + idPreco + "', '" + idQuantidade + "', '" + idTotal + "'), atualizaIdLivro('" + idPreco + "', '" + idLivro + "')")
        elementos.find('#quantidade').attr('id', idQuantidade)
        elementos.find('#' + idQuantidade).attr('onchange', "calculateTotal('" + idPreco + "', '" + idQuantidade + "', '" + idTotal + "')")
        elementos.find('#total').attr('id', idTotal)
        elementos.find('#' + idTotal).attr('onchange', "calculateTotal('" + idPreco + "', '" + idQuantidade + "', '" + idTotal + "')")

        $(".novoProduto").append(elementos)
        contador += 1
      }

      function calculateTotal(preco, quantidade, total) {
        var preco = document.getElementById(preco).value;
        var quantidade = document.getElementById(quantidade).value;
        var totalM = parseInt(preco) * parseInt(quantidade);
        document.getElementById(total).value = totalM;
      }

      function atualizaIdLivro(preco, idLivro) {
        var precoSelecionado = document.getElementById(preco).value;
        var idLivroSelecionado = document.getElementById(preco).options[document.getElementById(preco).selectedIndex].getAttribute("data-id");
        document.getElementById(idLivro).value = idLivroSelecionado;
      }
    </script>
  </div>
</body>

</html>