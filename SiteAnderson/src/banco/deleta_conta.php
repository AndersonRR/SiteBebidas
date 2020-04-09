<?php
include('conecta.php');
session_start();

$id    = $_SESSION['id'];
$senha = md5($_POST['senha']);

$sql       = "SELECT senha FROM pessoa WHERE id=$id";
$res       = mysqli_query($id_conexao, $sql);
$row       = mysqli_fetch_row($res);

if ($senha == $row[0]) {

	$sqlDeleta = "DELETE FROM pessoa WHERE id=?";

	if ($stmt = mysqli_prepare($id_conexao, $sqlDeleta)) {

		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 'i', $id);


		/* executa query */
		if(mysqli_stmt_execute($stmt)){
			echo  
			"<script>alert('Conta excluída com SUCESSO!');
			location.href='terminar_sessao.php';
			</script>";
		}
		else{
			echo  
			"<script>alert('Erro!');
			location.href='../paginas/formulario.php';
			</script>";
		}

		/* close statement */
		mysqli_stmt_close($stmt);
	}
	else {
	//echo mysqli_error($id_conexao);
	}
}else {
	$var = "
	<script>
	alert('Senha Incorreta');
	javascript:history.back(-1)
	</script>";
	echo $var;
}

?>
