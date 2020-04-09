
<?php 
include ('../layout/head.php'); 
include('../banco/conecta.php');

$id_pessoa = $_SESSION['id'];

$sqlPedidos = "SELECT id, data_pedido FROM pedido WHERE id_pessoa=$id_pessoa";

$queryPedidos = mysqli_query($id_conexao, $sqlPedidos);
?>

<div class="container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
       <h2>Compras</h2><br>
     </div>
  </div> 
  <div class="row">

    <table class="table table-hover a">
      <thead class="table-dark">
        <tr>
          <th width="60" scope="col">#</th>
          <th width="244" scope="col">Data</th>
          <th width="79" scope="col">Total</th>
          <th width="79" scope="col">Detalhes</th>
        </tr>
      </thead>
      <form action="?acao=up" method="post">
        <tbody>

          <?php
          $cont = 1;
          while($row = mysqli_fetch_array($queryPedidos)){
            $sqlAux = "SELECT SUM((qtd * preco_produto)) AS total FROM item_pedido WHERE id_pedido=$row[0]";
            $qr     = mysqli_query($id_conexao,$sqlAux);
            $rowAux = mysqli_fetch_row($qr);
            $total  = number_format($rowAux[0], 2, ',', '.');
            echo " 
            <a href='detalhes_pedido.php'>
            <tr>
            <td>$cont</td>       
            <td>$row[1]</td>
            <td>R$ $total</td>
            <td><a href='detalhes_pedido.php?id_pedido=$row[0]&index=$cont'>Ver Detalhes</a></td>
            </td>
            </tr>
            ";
            $cont++;
          }
          ?>
        </tbody>
      </form>
    </table>

  </div>
</div>
<p id="titulo"><a href="produtos.php" class="semSublinhado">
  <button class="btn btn-primary ">Ir às compras!</button>
</a></p>
<?php include('../layout/foot.php') ?>
</div>