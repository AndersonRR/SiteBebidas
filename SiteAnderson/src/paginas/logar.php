<!doctype html>
<html class="htmlLogin">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Logar no site Univalle</title>

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/custom.css" rel="stylesheet">
</head>

<body class="text-center" class="bodyLogin">
  <form class="form-signin" action="../banco/login.php" method="post">
    <img class="mb-4" src="../../img/outros/caminhao.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Entrar no site</h1>
    <label for="usuario" class="sr-only">Usuário</label>
    <input type="text" name="usuario" class="form-control" placeholder="Usuário" required autofocus>

    <label for="senha" class="sr-only">Senha</label>
    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="lembrar-me"> Lembrar-me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    <a href="../../index.php"><p class="mt-5 mb-3 text-muted">Voltar</p></a>
  </form>
  <a href="formulario.php" class="semSublinhado">
    <button class="btn btn-lg btn-primary ">Cadastre-se</button>
  </a>
</body>
</html>
