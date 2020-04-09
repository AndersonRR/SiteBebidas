
<?php 
include ('../layout/head.php'); 
include('../banco/conecta.php');

$chave = 0;
$caminhoInserir = "../banco/insere_pedido.php"; 

session_start();

if (!isset($_SESSION['nome'])) {
  $var = "
  <script>
  alert('É necessário estar logado para comprar!');
  javascript:history.back(-1)
  </script>";
  echo $var;
}else{
  if(!isset($_SESSION['carrinho'])){ 
    $_SESSION['carrinho'] = array(); 
  } //adiciona a lista de produtos à sessão
  
  if(isset($_GET['acao'])){ 
  //Adicionar no carrinho
    if($_GET['acao'] == 'add'){ 
      $id = intval($_GET['id']); 
      if(!isset($_SESSION['carrinho'][$id])){ 
        $_SESSION['carrinho'][$id] = 1; 
      } else { 
        $_SESSION['carrinho'][$id] += 1; 
      } 
    }
  } 
  //Remover do carrinho 
  if($_GET['acao'] == 'del'){ 
    $id = intval($_GET['id']); 
    if(isset($_SESSION['carrinho'][$id])){ 
      unset($_SESSION['carrinho'][$id]); 
    } 
  } 
    //Alterar a quantidade dos produtos no carrinho
  if($_GET['acao'] == 'up'){ 
    if(is_array($_POST['prod'])){ 
      foreach($_POST['prod'] as $id => $qtd){
        $id  = intval($id);
        $qtd = intval($qtd);
        if(!empty($qtd) || $qtd <> 0){
          $_SESSION['carrinho'][$id] = $qtd;
        }else{
          unset($_SESSION['carrinho'][$id]);
        }
      }
    }
  }
}
?>

<div class="container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
       <h2>Carrinho de Compras</h2><br>
     </div>
     <div class="col-md-6">
      <h5><p id="alinharDireita">
        <a href="produtos.php" class="semSublinhado">
          <img src="../../img/outros/voltar.png" width="100" height="50">
        </a></p></h5>
      </div>
    </div> 

    <table class="table table-hover a">
      <thead class="table-dark">
        <tr>
          <th width="60" scope="col">Item</th>
          <th width="244" scope="col">Produto</th>
          <th width="79" scope="col">Quantidade</th>
          <th width="150" scope="col">Preço</th>
          <th width="150" scope="col">SubTotal</th>
          <th width="10" scope="col"></th>
        </tr>
      </thead>
      <form action="?acao=up" method="post">
        <tfoot>
          <tr>
            <td colspan="6">
              <button class="btn btn-primary " type="submit">Atualizar Carrinho</button>
            </td>
          </tfoot>

          <tbody>
           <?php
           if(count($_SESSION['carrinho']) == 0){
            echo '
            <tr>
            <td colspan="6">Não há produtos no carrinho</td>
            </tr>
            ';
            $_SESSION['totalCompras'] = number_format(0, 2, ',', '.');
            $chave = 1;
          }else {
            $total = 0;
            $cont = 1;
            foreach($_SESSION['carrinho'] as $id => $qtd){
              $sql   = "SELECT id, descricao, preco  FROM produto WHERE id= $id";
              $qr    = mysqli_query($id_conexao, $sql);
              $row   = mysqli_fetch_row($qr);
              $nome  = $row[1];
              $preco = number_format($row[2], 2, ',', '.');
              $sub   = number_format($row[2] * $qtd, 2, ',', '.');
              $total += $row[2] * $qtd;
              echo '
              <tr>
              <td>'.$cont.'</td>       
              <td>'.$nome.'</td>
              <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'" /></td>
              <td>R$ '.$preco.'</td>
              <td>R$ '.$sub.'</td>
              <td>
              <a href="?acao=del&id='.$id.'" class="semSublinhado">
              <img src="../../img/outros/botao_remover.png" width="40" height="30">
              </a>
              </td>
              </tr>';
              $cont++;
            }
            $total = number_format($total, 2, ',', '.');
            echo '<tr>                         
            <td colspan="5"><b>Total</b></td>
            <td><b>R$ '.$total.'</b></td>
            </tr>';
              //colando o total na Session para acessar o valor na página dos produtos
            $_SESSION['totalCompras'] = $total;
          }
          ?>
        </tbody>

      </tr>
    </form>
  </table>
  <a href= "<?php  
    if ($chave == 0) {
      echo $caminhoInserir;
    }else{
      echo "#";
    }
    ?>" class="semSublinhado">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar Compras</button>
  </a>
</div>
<?php include('../layout/foot.php') ?>
</div>
