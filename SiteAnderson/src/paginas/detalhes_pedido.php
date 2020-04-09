
<?php 
include ('../layout/head.php'); 
include('../banco/conecta.php');

$id_pessoa    = $_SESSION['id'];
$id_pedido    = intval($_GET['id_pedido']);
$numeroCompra = intval($_GET['index']);

$sqlItensPedido = 
"SELECT produto.descricao, qtd, preco_produto FROM item_pedido INNER JOIN produto on produto.id=item_pedido.id_produto AND item_pedido.id_pedido=$id_pedido";

$queryPedidos = mysqli_query($id_conexao, $sqlItensPedido);
?>

<div class="container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
       <h2>Detalhes da compra número <?php echo $numeroCompra; ?></h2><br>
     </div>
   </div> 
   <div class="row">

    <table class="table table-hover a">
      <thead class="table-dark">
        <tr>
          <th width="20" scope="col">Item</th>
          <th width="244" scope="col">Produto</th>
          <th width="79" scope="col">Quantidade</th>
          <th width="79" scope="col">Preço</th>
          <th width="79" scope="col">SubTotal</th>
        </tr>
      </thead>
      <form action="?acao=up" method="post">
        <tbody>

          <?php
          $cont = 1;
          while($row = mysqli_fetch_array($queryPedidos)){
            $descricao = $row[0];
            $qtd       = $row[1];
            $preco     = number_format($row[2], 2, ',', '.'); 
            $subTotal  = number_format($row[2] * $qtd, 2, ',', '.');
            $total     += $row[2] * $qtd;
            echo " 
            <tr>
            <td>$cont</td>       
            <td>$descricao</td>
            <td>$qtd</td>
            <td>R$ $preco</td>
            <td>R$ $subTotal</td>
            </td>
            </tr>

            ";
            $cont++;
          }
          $total = number_format($total, 2, ',', '.');
          echo '<tr>                         
          <td colspan="4"><b>Total</b></td>
          <td><b>R$ '.$total.'</b></td>
          </tr>';
          ?>
        </tbody>
      </form>
    </table>

  </div>
</div>
<p id="titulo"><a href="compras_usuario.php" class="semSublinhado">
  <button class="btn btn-primary ">Voltar</button>
</a></p>
<?php include('../layout/foot.php') ?>
</div>