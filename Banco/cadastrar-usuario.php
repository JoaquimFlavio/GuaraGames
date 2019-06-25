<?php
    require('usuario.php');

    if(isset($_POST['email']) && isset($_POST['senha'])) {

      $usuario = new Usuario();
      $usuario->setEmail($_POST['email']);
      $usuario->setSenha($_POST['senha']);
      $usuario->setDataCadastro();

      if($usuario->cadastra()) {
        echo "Usuário cadastrado com sucesso.";
      } else {
        echo "Erro ao cadastrar usuário.";
      }

    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 tags acima devem sempre vir acima de qualquer outra coisa na cabeça do documento -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Lanhouse</title>

    <!-- CSS principal do Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados deste modelo -->
    <link href="css/justified-nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <div class="masthead">
        <h3 class="text-muted"><a href="index.php">Lanhouse</a></h3>
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">

        <form method="post">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <input type="password" name="senha" class="form-control" placeholder="Senha">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </form>

      </div>

      <!-- Rodapé -->
      <footer class="footer">
        <p>IFTO 2014</p>
      </footer>

    </div> <!-- /container -->


    <!-- Correção de bug do IE10 -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
