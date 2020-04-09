<?php 
include('src/banco/conecta.php');

$sql = "SELECT produto.id, produto.descricao, SUM(qtd * preco_produto) AS total FROM item_pedido 
LEFT JOIN produto on item_pedido.id_produto = produto.id
GROUP BY produto.id
ORDER BY total DESC";

$qr = mysqli_query($id_conexao, $sql);

?>

<div class="col-md-12">
	<h2 text-align="left">Top #5 Produtos Vendidos</h2>
	<table class="table table-hover a">
		<thead>
			<tr>
				<th>Posição</th>
				<th>Produto</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$max  = 5;
			$cont = 1;
			for ($i=$max; $i > 0 ; $i--) { 
				if ($row = mysqli_fetch_array($qr)) {
					echo "
					<tr>
					<td>$cont"."º"."</td>
					<td>$row[1]</td>
					<td>R$ $row[2]</td>
					</tr>
					";
				}else{
					echo "
					<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					</tr>
					";
				}
				$cont++;
			}  
			?>

		</tbody>
	</table>
	<br>
</div>