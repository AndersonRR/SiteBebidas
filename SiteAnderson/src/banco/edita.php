<?php


$erro = false;

if(!$_GET['id']){
	$erro = "Registro não informado";
	
}	
else{
	$id = $_GET['id'];

	include('conecta.php');

	$sql = "
	SELECT pessoa.nome, sobrenome, email, cpf, endereco, estado.sigla_uf, cidade.nome, cep FROM pessoa 
	LEFT JOIN estado on pessoa.estado = estado.id 
	LEFT JOIN cidade on pessoa.cidade = cidade.id 
	WHERE pessoa.id=$id";
	

	$resultado = mysqli_query($id_conexao, $sql);
	$row = mysqli_fetch_row($resultado);

	
	if(mysqli_num_rows($resultado) == 1){
		$nome		= $row[0];
		$sobrenome	= $row[1];
		$email		= $row[2];
		$cpf		= $row[3];
		$endereco	= $row[4]; 
		$estado 	= $row[5];   
		$cidade 	= $row[6];
		$cep		= $row[7];
		$arq        = "../banco/atualiza.php";
		include('../paginas/formulario.php');
		mysqli_free_result($resultado);
	}
	else{
		$erro = "Registro não encontrado";
	}
}


if($erro){
	echo $erro;
	echo "<br/><a href='index.php'>Voltar</a>";
}


?>
