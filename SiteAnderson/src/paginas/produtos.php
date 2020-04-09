
<?php 
include ('../layout/head.php'); 
include('../banco/conecta.php');

$sqlProdutos = "SELECT id, descricao, preco FROM produto";

$queryProdutos = mysqli_query($id_conexao, $sqlProdutos);
?>

<div class="container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
       <h2>Loja</h2><br>
     </div>
     <div class="col-md-6">
      <h5><p id="alinharDireita"><?php echo "R$ ".$_SESSION['totalCompras'];  ?>
      <a href="carrinho.php" class="semSublinhado">
        <img src="../../img/outros/carrinho_supermercado.png" width="75" height="40">
      </a></p></h5>
    </div>
  </div> 
  <div class="row">

    <?php
    while($row = mysqli_fetch_array($queryProdutos)){
      echo " 
      <div class='col-md-2 d-flex flex-column bordaDiv' >
      <img src='../../img/produtos/$row[0].png' class='imgCenter'>
      <p id='titulo'>$row[1]</p>
      <p id='tituloPreco'>R$ ".number_format($row[2], 2, ',', '.')."</p>
      <p id='botaoBottom'><a href='carrinho.php?acao=add&id=$row[0]'><button class='btn btn-info  mt-auto'>Adicionar</button></a></p>
      </div>

      ";
    }
    ?>
  </div>
</div>
<?php include('../layout/foot.php') ?>
</div>