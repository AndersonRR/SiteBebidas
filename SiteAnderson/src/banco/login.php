<?php

$erro = false;

if(!$_POST['usuario'] || !$_POST['senha']){
	$erro = "Usuário ou senha não informados!";
}	
else{
	include('terminar_sessao.php');
	$usuario = $_POST['usuario'];
	$senha   = md5($_POST['senha']);

	include('conecta.php');

	$sql = "SELECT id, nome, usuario, senha FROM pessoa WHERE usuario='$usuario'";
	
	$resultado = mysqli_query($id_conexao, $sql);

	if(mysqli_num_rows($resultado) == 1){
		$row = mysqli_fetch_row($resultado);
		if ($senha == $row[3]) {
			session_start();
			if (!isset($_SESSION['nome'])) {
				$_SESSION['nome']         = $row[1];
				$_SESSION['id']           = $row[0];
				$_SESSION['totalCompras'] = number_format(0, 2, ',', '.');

				//Redireciona para a página
				header("Location: ../../index.php");
			}
		}else{
			$var = "
			<script>
			alert('Senha incorreta!');
			javascript:history.back(-1)
			</script>";
			echo $var;
		}
	}
	else{
		$var = "
		<script>
		alert('Usuário não encontrado!');
		javascript:history.back(-1)
		</script>";
		echo $var;
	}
}
?>