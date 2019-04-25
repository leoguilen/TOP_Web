<?php
    if(isset($_GET['erro'])==1){
      $err = 1;
    } else {$err = 0; }

    if(isset($_GET['sucesso'])==1){
      $success = 1;
    } else {$success = 0;}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/cadastro/img/Logo.png"/>
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TOP - Teste de orientação profissional</title>

  <link href="assets/recuperar-senha/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/recuperar-senha/css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/cadastro/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/cadastro/css/Pretty-Registration-Form.css">
  <link rel="stylesheet" href="assets/cadastro/css/styles.css">
  <link rel="stylesheet" href="assets/login/css/Google-Style-Text-Input.css">
  <link href="assets/dashboard/css/themify-icons.css" rel="stylesheet">
  <script>
      var err = "<?php echo $err; ?>";
      var success = "<?php echo $success; ?>";
      
      function verificaEnvio()
      {

        $("#envioS").hide();

        if(err==1)
        {
          $("#envioN").show();
          $("#envioS").hide();
          alert("Ocorreu um erro ao enviar seu email!");
        }
        if(success == 1){
          $("#envioS").show();
          $("#envioN").hide();
        }

      }

  
  
  </script>

</head>

<body class="bg-dark" onload="verificaEnvio()">
  <nav class="navbar navbar-light navbar-expand">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
            <img src="assets/cadastro/img/Logo.png">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
  </nav>

  <div class="container" id="envioS">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Confirmação de envio</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4 class="text-success">Email enviado com sucesso <a class="ti-check"></a></h4>
          <p>Acesse seu email, abra o email de recuperação de senha e clique no link para redireciona-lo para página de mudança de senha! </p>
        </div>
      </div>
      <div class="card-footer">
        <a class="d-block large mt-3" href="index.html">Voltar para o inicio</a>
        </div>
    </div>
  </div>

  <div class="container" id="envioN">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Recuperar senha</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Esqueceu sua senha?</h4>
          <p>Entre com seu endereço de email e nós vamos enviar as instruções de como recuperar sua senha.</p>
        </div>

        <form name="frm-recuperarSenha" action="enviar_recuperar-senha.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="txtRecuSenha" id="txtRecuSenha" class="form-control" style="height: 15mm" placeholder="Insira seu email aqui" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <button class="btn btn-info btn-block" type="submit">Enviar</button>
        </form>

        <div class="text-center">
          <a class="d-block small mt-3" href="tela-cadastro.php">Não possui uma conta?</a>
          <a class="d-block small" href="login.php">Pagina de login</a>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/recuperar-senha/vendor/jquery/jquery.min.js"></script>
  <script src="assets/recuperar-senha/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/recuperar-senha/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
