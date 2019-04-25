<?php
    
    if(isset($_GET['erro'])==1)
    {
        $result = 1;

    } else {
        $result = 0;
    }

    if(isset($_GET['sucesso'])==1)
    {
        $valido = 1;
    } else {
        $valido = 0;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP - Teste de Orientação Profissional</title>
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/cadastro/img/Logo.png"/>
    <link rel="stylesheet" href="assets/cadastro/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/cadastro/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/cadastro/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/cadastro/css/styles.css">
    <link rel="stylesheet" href="assets/login/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.1.1/darkly/bootstrap.min.css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/dashboard/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/dashboard/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="assets/dashboard/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/dashboard/css/themify-icons.css" rel="stylesheet">

    <script>
        var res = "<?php echo $result;?>";
        var val = "<?php echo $valido;?>";
        function voltaErro()
        {
            $("#erro").hide();

            if(res==1)
            {
                $("#erro").show();
            }
            if(val==1)
            {
                alert("Senha atualizada com sucesso! Agora você ja pode acessar seu painel");
            }
        }
    </script>
</head>

<body onload="voltaErro()">
    <nav class="navbar navbar-light navbar-expand" style="margin-top: -6mm">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="assets/cadastro/img/Logo.png">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card bg-white col-lg-3 mx-auto" style="padding: 35px">
            <form name="form-cadastro" action="validar_login.php" method="post" novalidate>
                <h2 class="text-center">
                    <img src="assets/cadastro/img/Logo.png" style="margin-bottom: 5mm;width: 120px;">
                </h2>
                <div class="alert alert-danger" id="erro">
                    <strong>Login Invalido</strong> verifique se estão corretos seu username ou senha
                </div>
                <div class="form-group">
                    <p style="color: black">Usuario</p>
                    <input type="text" class="form-control border-input" id="nome" name="nome" placeholder="Usuario" autocomplete="false" required>
                </div>
                <div class="form-group">
                    <p style="color: black">Senha</p>
                    <input type="password" class="form-control border-input" id="senha" name="senha" placeholder="Senha" autocomplete="false" required>
                    <hr>
                </div>
                
                <div class="form-group" >
                    <button class="btn btn-outline-primary btn-block" type="submit">Entrar</button>
                </div>
                <footer class="text-center">
                <a href="tela-cadastro.php" class="already">Não possui um cadastro?</a><br>
                <a href="esqueceu-senha.php" class="already">Esqueceu sua senha?</a>
                </footer>
            </form>
        </div>
        </div>
    </div>
    </div>

    <script src="assets/cadastro/js/jquery.min.js"></script>
    <script src="assets/cadastro/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="assets/cadastro/js/validator.js"></script>
    <script src="assets/dashboard/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/dashboard/js/bootstrap-checkbox-radio.js"></script>
    <script src="assets/dashboard/js/chartist.min.js"></script>
    <script src="assets/dashboard/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="assets/dashboard/js/paper-dashboard.js"></script>
    <script src="assets/dashboard/js/demo.js"></script>
</body>

</html>