<?php 
include('src/banco/conecta.php');

$sql = "SELECT pessoa.id, pessoa.nome, pessoa.sobrenome, pessoa.email, SUM(qtd * preco_produto) AS total FROM item_pedido 
LEFT JOIN pedido on pedido.id = item_pedido.id_pedido 
LEFT JOIN pessoa on pedido.id_pessoa = pessoa.id 
GROUP BY pessoa.id
ORDER BY total DESC";

$qr = mysqli_query($id_conexao, $sql);

?>

<div class="col-md-12">
	<h2 text-align="left">Maiores Clientes</h2>
	<table class="table table-hover a">
		<thead>
			<tr>
				<th>Posição</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$max = 5;
			$cont = 1;
			for ($i=$max; $i > 0 ; $i--) { 
				if ($row = mysqli_fetch_array($qr)) {
					echo "
					<tr>
					<td>$cont"."º"."</td>
					<td>".$row[1]." ".$row[2]."</td>
					<td>$row[3]</td>
					<td>R$ $row[4]</td>
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