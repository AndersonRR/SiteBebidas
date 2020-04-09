<?php
include('conecta.php');

$id			= $_POST['id'];
$nome		= $_POST['nome'];
$sobrenome	= $_POST['sobrenome'];
$email		= $_POST['email'];
$cpf		= $_POST['cpf'];
$endereco	= $_POST['endereco']; //devemos pela UF pegar o ID
$estadoAux	= $_POST['estado'];   //devemos pelo nome pegar o ID
$cidadeAux	= $_POST['cidade'];
$cep		= $_POST['cep'];

$sqlEstados = "SELECT id FROM estado WHERE sigla_uf='$estadoAux'";
$sqlCidades = "SELECT id FROM cidade WHERE nome = '$cidadeAux'";

$resultadoEstados = mysqli_query($id_conexao, $sqlEstados);
$resultadoCidades = mysqli_query($id_conexao, $sqlCidades);

$row = mysqli_fetch_row($resultadoEstados);
$estado = $row[0];
$row = mysqli_fetch_row($resultadoCidades);
$cidade = $row[0];

$sql = 
"UPDATE pessoa SET nome=?, sobrenome=?, email=?, cpf=?, endereco=?, estado=?, cidade=?, cep=? WHERE id=?";


if ($stmt = mysqli_prepare($id_conexao, $sql)) {

	/* bind parametros for markers */
	mysqli_stmt_bind_param($stmt, 'sssssiisi', $nome, $sobrenome, $email, $cpf, 
		$endereco, $estado, $cidade, $cep, $id);


	/* executa query */
	if(mysqli_stmt_execute($stmt)){
		echo  
		"<script>alert('Informações salvas com SUCESSO!');
		location.href='../../index.php';
		</script>";
	}
	else{
		echo  "
		<script>
		alert('Ocorreu um erro!');
		javascript:history.back(-1)
		</script>";
	}


	/* close statement */
	mysqli_stmt_close($stmt);
}
else {
	echo mysqli_error($id_conexao);
}
echo "<a href='index.php'>Voltar</a>";


?>
