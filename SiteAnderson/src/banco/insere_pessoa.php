<?php

include('conecta.php');

$nome		= $_POST['nome'];
$sobrenome	= $_POST['sobrenome'];
$email		= $_POST['email'];
$cpf		= $_POST['cpf'];
$endereco	= $_POST['endereco']; //devemos pela UF pegar o ID
$estadoAux	= $_POST['estado'];   //devemos pelo nome pegar o ID
$cidadeAux	= $_POST['cidade'];
$cep		= $_POST['cep'];
$usuario	= $_POST['usuario'];
$senha		= md5($_POST['senha']);

$sqlEstados = "SELECT id FROM estado WHERE sigla_uf='$estadoAux'";
$sqlCidades = "SELECT id FROM cidade WHERE nome = '$cidadeAux'";

$resultadoEstados = mysqli_query($id_conexao, $sqlEstados);
$resultadoCidades = mysqli_query($id_conexao, $sqlCidades);

$row = mysqli_fetch_row($resultadoEstados);
$estado = $row[0];
$row = mysqli_fetch_row($resultadoCidades);
$cidade = $row[0];

$sql = "INSERT INTO pessoa (nome, sobrenome, email, cpf, endereco, estado, cidade, cep, usuario, senha) 
VALUES (?,?,?,?,?,?,?,?,?,?)";


if ($stmt = mysqli_prepare($id_conexao, $sql)) {

	/* bind parametros for markers */
	mysqli_stmt_bind_param($stmt, 'sssssiisss', $nome, $sobrenome, $email, $cpf, 
		$endereco, $estado, $cidade, $cep, $usuario, $senha);

	/* executa query */
	if(mysqli_stmt_execute($stmt)){
		echo  
		"<script>alert('Usuário cadastrado com SUCESSO! Faça login.');
		location.href='../paginas/logar.php';
		</script>";
		echo "<a href='../../index.php'>Voltar</a>";
	}
	else{
		echo  "
		<script>
		alert('Erro: esse usuário já existe! Insira outro.');
		javascript:history.back(-1)
		</script>";
	}


	/* close statement */
	mysqli_stmt_close($stmt);
}

?>
