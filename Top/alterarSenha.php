<?php

    session_start();
    
    if(!isset($_SESSION['logado']))
        header('Location: login.php');
    
    if(isset($_GET['err']) != 1 && 2){
       $err = 0;
    } else {
        $err = 1;
    }
?>

<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/dashboard/img/apple-icon.png">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/cadastro/img/Logo.png"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>TOP - Teste de orientação profissional</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/dashboard/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/dashboard/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="assets/dashboard/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/dashboard/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="info">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <img src="assets/dashboard/img/Logo.png" width="100px" height="55px">
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="perfil.php">
                        <i class="ti-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li class="active">
                    <a href="alterarSenha.php">
                        <i class="ti-shield"></i>
                        <p>Alterar senha</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="dashboard.php">Configurações do perfil</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                              <a href="cursos.php">
                                  <i class="ti-folder"></i>
                                  <p>Cursos</p>
                              </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="ti-shift-right"></i>
                                <p>Sair</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form name="frm-atualizaPerfil" action="atualiza-senha-user.php" method="post">
                    <div class="col-lg-8 col-md-offset-2">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mudar senha</h4>
                                <hr>
                            </div>
                            <div class="content">
                                <form name="frm-atualizaPerfil" action="atualiza-senha-user.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label>Senha atual</label>
                                                <input type="password" class="form-control border-input" name="txtSenhaAtual" placeholder="Senha atual" autocomplete="false" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label>Senha nova</label>
                                                <input type="password" class="form-control border-input" name="txtSenhaNova" placeholder="Senha nova" autocomplete="false" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="form-group">
                                                <label>Confirmar nova senha</label>
                                                <input type="password" class="form-control border-input" name="txtConfSenha" placeholder="Confirmar nova senha" autocomplete="false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center" style="margin-bottom: 4mm;margin-top: 3mm">
                                        <button type="submit" class="btn btn-info btn-wd">Salvar</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

    <script src="assets/dashboard/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/dashboard/js/bootstrap-checkbox-radio.js"></script>
    <script src="assets/dashboard/js/chartist.min.js"></script>
    <script src="assets/dashboard/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="assets/dashboard/js/paper-dashboard.js"></script>
    <script src="assets/dashboard/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
                var err = "<?php echo $err;?>";

                if(err != 0)
                {
                    $.notify({
                        icon: 'ti-info',
                        message: "Erro ao salvar nova senha!"
                    },{
                        type: 'danger',
                        timer: 4000
                    });
                } else {
                    $.notify({
                        icon: 'ti-check',
                        message: "Atualizado com sucesso!"
                    },{
                        type: 'success',
                        timer: 4000
                    });
                }
        });
    </script>
</html>
