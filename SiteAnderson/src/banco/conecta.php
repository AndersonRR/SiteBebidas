<?php
	$dbname="db_univalle";
	$host="localhost"; //se alterar a porta deve fazer: localhost: 3309
	$usuarioRoot="root";
	$senhaRoot="";

	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
	if(!($id_conexao = mysqli_connect($host,$usuarioRoot,$senhaRoot)))
	{
		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL.";
		exit;
	}

	if(!($conexao = mysqli_select_db($id_conexao, $dbname)))
	{
		echo "Não foi possível conectar ao banco de dados.";
		exit;
	}
	
	mysqli_query($id_conexao, "SET NAMES 'utf8'");
	$id_conexao_banco = new mysqli($host, $usuarioRoot, $senhaRoot, $dbname);
?>
