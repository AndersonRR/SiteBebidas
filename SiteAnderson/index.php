
<?php include('src/layout/head.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">

			<?php
			if (isset($_SESSION['nome'])) {
				$nome = $_SESSION['nome'];
				echo "<h2>Olá, $nome</h2>";				
			}else{
				echo "<h2>Seja bem-vindo!</h2>";
			}
			?>
			
			<h2>Quem nós somos?</h2>
			<p class="text-justify">Se você está procurando por qualidade de produtos e atendimento veio ao lugar certo! Nós somos a maior distribuidora de bebidas do noroeste do estado do Rio Grande do Sul e 5º maior do Brasil! Mas o que realmente nos preocupa é que você sinta-se completamente satisfeito com nosso serviço. Por isso, como visitante você pode acessar todo nosso site e conferir nosso portfólio de produtos, mas não perca tempo, crie uma conta gratuita agora e comece a comprar conosco!</p>

			<p class="text-justify">Trabalhamos com uma linha diversificada de bebidas da mais alta qualidade disponível no mercado (você pode conferir nossas marcas logo abaixo), oferecendo um preço competitivo e ainda entregamos diretamente na sua casa ou estabelecimento! E se você comprar muito conosco pode acabar aparecendo na lista dos nossos maiores clientes(confira abaixo)!</p>

		</div>
	</div>

	<?php 
	include('src/controles/marcas.php');
	include('src/controles/maiores_clientes.php');
	include('src/controles/maiores_produtos.php');
	?>
	<div class="row">
		<div class='col-md-5 d-flex flex-column bordaDiv' >
			<h2>Frota</h2>
			<ul class="demo-3">
				<li>
					<figure>
						<img src="img/outros/caminhoes.jpg" alt=""/>
						<figcaption>
							<h2>Uma frota inteira a sua disposição!</h2>
							<p>Contamos com mais de 20 caminhões para realizar as entregas por todas as partes do noroeste do estado do Rio Grande do Sul. Não se preocupe, nós certamente acharemos a sua casa ou estabelecimento!</p>
						</figcaption>
					</figure>
				</li>
			</ul>
		</div>
		<div class='col-md-1'>
		</div>
		<div class='col-md-5 d-flex flex-column bordaDiv' >
			<h2>Localização</h2>
			<ul class="demo-3">
				<li>
					<figure>
						<img src="img/outros/map.png" alt=""/>
						<figcaption>
							<h2>Fácil de achar</h2>
							<p>Estamos localizados no lugar mais conhecido da cidade de Ijuí! Se você quiser fazer uma visitinha, conhecer a empresa e ainda tomar um cafézinho, sabe onde nos econtrar!</p>
						</figcaption>
					</figure>
				</li>
			</ul>
		</div>
	</div>
	<?php include('src/layout/foot.php') ?>
</div>