<?php

    if(!isset($_GET['v@l1dAteNumb3r']))
    {header('location: index.html');}

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

</head>

<body class="bg-dark">
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
  <div class="container">
    <div class="card card-login mx-auto mt-5" style="padding:20px;">
      <div class="card-header">Mudar Senha</div>
      <div class="card-body">
        <form name="frm-recuperarSenha" action="mudarSenha.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="txtRecuSenha" id="txtRecuSenha" class="form-control" style="height: 14mm" required="required" autofocus="autofocus">
              <label style="margin-top:4mm" for="inputEmail">Senha nova</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="txtRecuConfSenha" id="txtRecuConfSenha" class="form-control" style="height: 14mm" required="required" autofocus="autofocus">
              <label style="margin-top:4mm" for="inputEmail">Confirmar senha nova</label>
            </div>
          </div>
          <button class="btn btn-info btn-block" type="submit">Salvar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="assets/recuperar-senha/vendor/jquery/jquery.min.js"></script>
  <script src="assets/recuperar-senha/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/recuperar-senha/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
