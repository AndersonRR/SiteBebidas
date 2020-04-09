<?php 
include ('../layout/head.php'); 
include('../banco/conecta.php');

if(!isset($id))
  $id         = isset($_GET["id"]) ? $_GET["id"] : null;
if(!isset($nome))
  $nome       = isset($_GET["nome"]) ? $_GET["nome"] : null;
if(!isset($sobrenome))
  $sobrenome  = isset($_GET["sobrenome"]) ? $_GET["sobrenome"] : null;
if(!isset($email))
  $email      = isset($_GET["email"]) ? $_GET["email"] : null;
if(!isset($cpf))
  $cpf        = isset($_GET["cpf"]) ? $_GET["cpf"] : null;
if(!isset($endereco))
  $endereco   = isset($_GET["endereco"]) ? $_GET["endereco"] : null;
if(!isset($estado))
  $estado     = isset($_GET["estado"]) ? $_GET["estado"] : "Selecione...";
if(!isset($cidade))
  $cidade     = isset($_GET["cidade"]) ? $_GET["cidade"] : "Selecione...";
if(!isset($cep))
  $cep        = isset($_GET["cep"]) ? $_GET["cep"] : null;
if(!isset($usuario))
  $usuario    = isset($_GET["usuario"]) ? $_GET["usuario"] : null;
if(!isset($senha))
  $senha      = isset($_GET["senha"]) ? $_GET["senha"] : null;
if(!isset($arq))
  $arq        = isset($_GET["arq"]) ? $_GET["arq"] : "../banco/insere_pessoa.php";

/*select da lista de estados e cidades*/
$sqlEstados = "SELECT sigla_uf FROM estado ORDER BY sigla_uf";
$sqlCidades = "SELECT nome FROM cidade ORDER BY nome";

$queryEstados = mysqli_query($id_conexao, $sqlEstados);
$queryCidades = mysqli_query($id_conexao, $sqlCidades);

?>

<div class="container">
  <div class="row">
    <div class="col-md-12 order-md-1">
      <h4 class="mb-3">Informações Pessoais</h4>
      <form class="needs-validation" novalidate method="post" action="<?php echo $arq; ?>">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" maxlength="75" value="<?php echo $nome; ?>" required>
            <div class="invalid-feedback">
              O nome é obrigatório.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sobrenome">Sobrenome</label>
            <input type="text" class="form-control" name="sobrenome" maxlength="75" placeholder="" 
            value="<?php echo $sobrenome ?>" required>
            <div class="invalid-feedback">
              O sobrenome é obrigatório.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email">E-mail <span class="text-muted">(Opcional)</span></label>
            <input type="email" class="form-control" name="email" maxlength="30" placeholder="voce@exemplo.com"
            value="<?php echo $email ?>">
            <div class="invalid-feedback">
              Por favor insira um endereço de e-mail válido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" name="cpf" placeholder="" value="<?php echo $cpf ?>" required maxlength="14">
            <div class="invalid-feedback">
              O CPF é obrigatório.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" maxlength="100" placeholder="Rua X nº400" required value="<?php echo $endereco ?>">
          <div class="invalid-feedback">
            Por favor insira seu endereço de entrega.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="estado">Estado</label>
            <select class="custom-select d-block w-100" name="estado" required>
              <option value=""><?php echo $estado ?></option>
              <?php
              while($row = mysqli_fetch_array($queryEstados)){
                echo "<option>$row[0]</option>";
              }
              ?>

            </select>
            <div class="invalid-feedback">
              Selecione um Estado.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="cidade">Cidade</label>
            <select class="custom-select d-block w-100" name="cidade" required>
              <option value=""><?php echo $cidade ?></option>
              <?php
              while($row = mysqli_fetch_array($queryCidades)){
                echo "<option>$row[0]</option>";
              }
              ?>
            </select>
            <div class="invalid-feedback">
              Selecione uma Cidade.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" name="cep" maxlength="8" placeholder="" required value="<?php echo $cep ?>">
            <div class="invalid-feedback">
              O CEP é obrigatório.
            </div>
          </div>
        </div>

        <?php 
        if ($arq == "../banco/insere_pessoa.php") {  
          echo 
          '<div class="mb-3">
          <label for="usuario">Usuário</label>
          <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text">@</span>
          </div>
          <input type="text" class="form-control" name="usuario" maxlength="75" placeholder="Usuário" required>
          <div class="invalid-feedback" style="width: 100%;">
          Nome de usuário é obrigatório.
          </div>
          </div>
          </div>

          <div class="mb-3">
          <label for="senha">Senha</label>
          <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text">#</span>
          </div>
          <input type="password" class="form-control" name="senha" maxlength="75" placeholder="" required>
          <div class="invalid-feedback" style="width: 100%;">
          Senha é obrigatório.
          </div>
          </div>
          </div>';
        }

        ?>

        <input type="hidden" name="id" value="<?php echo "$id" ?>">

        <button class="btn btn-primary btn-lg btn-block" type="submit">Confirmar Informações</button>
      </form>
    </div>
  </div>
  <br><br><br>
  <?php 
  if ($arq != "../banco/insere_pessoa.php") {  
    echo '<a href="../paginas/excluirAcc.php" class="semSublinhado"><button class="btn btn-danger btn-lg">Excluir Conta</button></a>';
    }?>

    <?php include('../layout/foot.php') ?>

    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="../../assets/js/vendor/holder.min.js"></script>
      <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

  </div>