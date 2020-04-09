<?php 
session_start();
if (isset($_SESSION['nome'])) {
	$nomeExibicao = $_SESSION['nome'];
	$id           = $_SESSION['id'];
}else {
	$nomeExibicao = "Login";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta  name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
	<title>Site Oficial Univalle</title>

	<link href="/SiteAnderson/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!--<script src="dist/js/bootstrap.min.js"></script>-->

	<link href="/SiteAnderson/css/custom.css" rel="stylesheet"/>

</head>

<body>
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron" >
					<table class="a">
						<body>
							<tr>
								<td><div> <img src="/SiteAnderson/img/outros/caminhao.png" class="rounded"  width="150" height="125"></div></td>
								<td><h1 class="display-4">Univalle Distribuidora de Bebidas</h1></td>
							</tr>
						</body>
					</table>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-sm bg-blue navbar-dark">
					<div class="container">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="/SiteAnderson/index.php">Início</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/SiteAnderson/src/paginas/produtos.php">Produtos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/SiteAnderson/src/paginas/formulario.php">Cadastre-se</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/SiteAnderson/src/paginas/info.php">Informações</a>
							</li>
						</ul>
						<div >
							<ul class="nav navbar-nav navbar-right">
								<?php if ($nomeExibicao == "Login") {
									echo "<a href='/SiteAnderson/src/paginas/logar.php'><li><button class='btn btn-info'>$nomeExibicao</button></li>";
								}else{
									echo "<div class='dropdown'>
									<button onclick='myFunction()' class='dropbtn' >$nomeExibicao</button>
									<div id='myDropdown' class='dropdown-content'>
									<a href='/SiteAnderson/src/banco/edita.php?id=$id'>Ajustes</a>
									<a href='/SiteAnderson/src/paginas/compras_usuario.php'>Compras</a>
									<a href='/SiteAnderson/src/banco/terminar_sessao.php'>Sair</a>
									</div>
									</div>";
								}
								?>
							</a>  
						</ul>
					</div>
				</div>	
			</nav>
		</div>
	</div>
</div>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	if (!event.target.matches('.dropbtn')) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			}
		}
	}
}
</script>

</body>
</html>