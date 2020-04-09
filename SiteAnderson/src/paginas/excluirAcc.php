<!doctype html>
<html class="htmlLogin">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Excluir Conta</title>

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/custom.css" rel="stylesheet">
</head>

<body class="text-center" class="bodyLogin">
  <form class="form-signin" action="../banco/deleta_conta.php" method="post">
    <img class="mb-4" src="../../img/outros/caminhao.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Excluir Conta</h1>

    <label for="senha" class="sr-only">Senha</label>
    <input type="password" name="senha" class="form-control" placeholder="Senha" required>

    <button class="btn btn-lg btn-danger btn-block" type="submit">Excluir</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    <a href="../../index.php"><p class="mt-5 mb-3 text-muted">Voltar</p></a>
  </form>
</body>
</html>
