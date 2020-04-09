<?php

include('conecta.php');
session_start();

$id_usuario = $_SESSION['id'];

$sql_pedido = "INSERT INTO pedido (data_pedido, id_pessoa) VALUES (NOW(), ?)";
$sql_item_pedido = "INSERT INTO item_pedido (qtd, preco_produto, id_produto, id_pedido) VALUES (?, ?, ? ,?)";

if ( ($stmt1 = mysqli_prepare($id_conexao, $sql_pedido)) && ($stmt2 = mysqli_prepare($id_conexao, $sql_item_pedido)) )  {
	
    // Desabilita o autocommit 
	mysqli_autocommit($id_conexao, FALSE);

	/* bind parametros for markers */
	mysqli_stmt_bind_param($stmt1, 'i', $id_usuario);

	/* executa query */
	if(mysqli_stmt_execute($stmt1)){
		$id_pedido = mysqli_insert_id($id_conexao);
		echo "Pedido Criado";

		//inserindo todos os produtos gravados na sessão do usuário
		foreach($_SESSION['carrinho'] as $id => $quantidade){
			$sql           = "SELECT id, preco  FROM produto WHERE id= $id";
			$qr            = mysqli_query($id_conexao, $sql);
			$row           = mysqli_fetch_row($qr);
			$id_produto    = $row[0];
			$preco_produto = $row[1];
			$qtd           = $quantidade;

			mysqli_stmt_bind_param($stmt2, 'idii', $qtd, $preco_produto, $id_produto, $id_pedido);

			if(mysqli_stmt_execute($stmt2)){ 
				//echo "Operação realizada com sucesso<br/>";
			}else{
				//echo "Ocorreu um erro na operação<br/>";

				echo mysqli_error($id_conexao);
			}

			//Zerando os valores de session após salvar o pedido atual
			$_SESSION['carrinho'] = array();
			$_SESSION['totalCompras'] = number_format(0, 2, ',', '.');

			//header("Location: ../paginas/compras_usuario.php");

			echo  "
			<script>
			alert('Compra realizada com SUCESSO!');
			location.href='../paginas/compras_usuario.php';
			</script>";
		}

	//else{
	//	echo "Ocorreu um erro na operação<br/>";
	//	// mostra o erro do banco
	//	echo mysqli_error($id_conexao);
	//}

    // Commita (transação)
		mysqli_commit($id_conexao);

		/* close statement */
		mysqli_stmt_close($stmt1);
		mysqli_stmt_close($stmt2);

		mysqli_autocommit($id_conexao, TRUE);
	}
} 
else{
	echo "Ocorreu um erro na operação<br/>";
		// mostra o erro do banco
	echo mysqli_error($id_conexao);
}


?>
