<?php
    ini_set('default_charset','UTF-8');

    include_once('banco.php');  

    $bd = new MyBanco();

    $strcn = $bd->Conectar();

    session_start();

    if(!isset($_SESSION['logado']))
        header('Location: login.php');

    $log = $_SESSION['logado'];

    if(!isset($_POST['txtBuscaCurso'])){
        $busca = null;
    } else {
        $busca = $_POST['txtBuscaCurso'];
    }

    $sqlBusca = "SELECT * FROM v_RelatorioCurso WHERE nome_curso like '$busca%' AND tipo_curso = 'G' ORDER BY nome_curso ASC";
    $resultBusca = sqlsrv_query($strcn,$sqlBusca,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRowsBusca = sqlsrv_num_rows($resultBusca);

    $sqlBuscaPG = "SELECT * FROM v_RelatorioCurso WHERE nome_curso like '$busca%' AND tipo_curso = 'PG' ORDER BY nome_curso ASC";
    $resultBuscaPG = sqlsrv_query($strcn,$sqlBuscaPG,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRowsBuscaPG = sqlsrv_num_rows($resultBuscaPG);

    $sql = "SELECT * FROM v_RelatorioCurso WHERE tipo_curso = 'G' ORDER BY nome_curso ASC";
    $result = sqlsrv_query($strcn,$sql,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRows = sqlsrv_num_rows($result);

    $sqlPG = "SELECT * FROM v_RelatorioCurso WHERE tipo_curso = 'PG' ORDER BY nome_curso ASC";
    $resultPG = sqlsrv_query($strcn,$sqlPG,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRowsPG = sqlsrv_num_rows($resultPG);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/dashboard/img/apple-icon.png">
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/cadastro/img/Logo.png"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>TOP - Teste de orientação profissional</title>

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
                <li>
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
                <li>
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
                    <a class="navbar-brand" href="dashboard.php">Cursos</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
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
                <div class="row">
                    <div class="col-lg-12 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-12">
                                       <h2 class="text-center" style="margin-top:0mm">Lista de cursos</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-7 col-md-offset-2">
                                    <form class="search-form" action="cursos.php" method="post">
                                        <div class="header">
                                            <h3 class="title">Conheça os cursos<br> disponiveis</h3>
                                        </div>
                                        <div class="content">
                                            <div class="form-group text-left col-md-offset-0" style="width:75mm">
                                                <label>Buscar</label>
                                                <input type="text" class="form-control border-input" id="txtBuscaCurso" name="txtBuscaCurso" placeholder="Buscar">
                                                <button class="btn btn-info col-md-offset-7" style="margin-top:4mm;width:30mm" type="submit">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 ">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="header" style="background-color:#21a9af;padding:20px;" >
                                            <p class="title text-left" style="color:white;font-size: 30px">Graduação</p>
                                        </div>
                                    </div>
                            <?php
                                    if($numRowsBusca>0){
                                
                                    while($row = sqlsrv_fetch_array($resultBusca,SQLSRV_FETCH_ASSOC))
                                    {
                                        $nomeCursoBusca = $row["nome_curso"];
                                        $descCursoBusca = $row["desc_curso"];
                                        $imgCursoBusca = $row["imagem_curso"];
                                        $tipoCursoBusca = $row["tipo_curso"];
                                        $duracaoCursoBusca = $row["duracao_curso"];
                                        $areaCursoBusca = $row["desc_area"];
                                        $idCursoBusca = $row["id_curso"];
                            ?>
                            <div class="col-md-6">
                                <div class="card" style="border: 1px solid #21a9af;margin-right:10px;margin-left:10px;margin-top:25px;">
                                    <img class="card-img-top" src="<?php echo $imgCursoBusca; ?>" width="100%" height="150px" style="padding:15px;">
                                    <div class="card-header content">
                                        <h4 class="card-title" style="margin-bottom:-20mm;margin-top:-2mm;font-size:17px;color:#008B8B;padding-left:10px;height:100px"><?php echo utf8_encode($nomeCursoBusca); ?></h4>
                                    </div>
                                    <div class="card-footer text-right content">
                                        <hr>
                                        <a href="#">
                                            <i class="ti-arrow-circle-right"></i>
                                            Saiba Mais
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                            ?>
                            <?php
                            } else {

                                if($numRows>0)
                                {
                                    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
                                    {
                                        $nomeCurso = $row["nome_curso"];
                                        $descCurso = $row["desc_curso"];
                                        $imgCurso = $row["imagem_curso"];
                                        $tipoCurso = $row["tipo_curso"];
                                        $duracaoCurso = $row["duracao_curso"];
                                        $areaCurso = $row["desc_area"];
                                        $idCurso = $row["id_curso"];
                            ?> 
                                <div class="col-md-6">
                                <div class="card" style="border: 1px solid #21a9af;margin-right:10px;margin-left:10px;margin-top:25px;">
                                    <img class="card-img-top" src="<?php echo $imgCurso; ?>" width="100%" height="150px"  style="padding:15px;">
                                    <div class="card-header content">
                                        <h4 class="card-title" style="margin-bottom:-20mm;margin-top:-2mm;font-size:17px;color:#008B8B;padding-left:10px;height:100px"><?php echo utf8_encode($nomeCurso); ?></h4>
                                    </div>
                                    <div class="card-footer text-right content">
                                        <hr>
                                        <a href="#">
                                            <i class="ti-arrow-circle-right"></i>
                                            Saiba Mais
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php  
                                    }
                                }
                            }
                            ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-offset-5" style="margin-top:-20mm">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="header" style="background-color:#21a9af;padding:20px;" >
                                        <p class="title text-left" style="color:white;font-size: 30px">Pós-Graduação</p>
                                    </div>
                                </div>
                            <?php    
                                if($numRowsBuscaPG>0){
                                while($row = sqlsrv_fetch_array($resultBuscaPG,SQLSRV_FETCH_ASSOC))
                                {
                                    $nomeCursoBuscaPG = $row["nome_curso"];
                                    $descCursoBuscaPG = $row["desc_curso"];
                                    $imgCursoBuscaPG = $row["imagem_curso"];
                                    $tipoCursoBuscaPG = $row["tipo_curso"];
                                    $duracaoCursoBuscaPG = $row["duracao_curso"];
                                    $areaCursoBuscaPG = $row["desc_area"];
                                    $idCursoBuscaPG = $row["id_curso"];
                            ?>
                                <div class="col-md-6">
                                    <div class="card" style="border: 1px solid #21a9af;margin-right:10px;margin-left:10px;margin-top:25px;">
                                        <img class="card-img-top" src="<?php echo $imgCursoBuscaPG;?>" width="100%" height="150px"  style="padding:15px;">
                                        <div class="card-header content">
                                            <h4 class="card-title" style="margin-bottom:-20mm;margin-top:-2mm;font-size:17px;color:#008B8B;padding-left:10px;height:100px"><?php echo utf8_encode($nomeCursoBuscaPG);?></h4>
                                        </div>
                                        <div class="card-footer text-right content">
                                            <hr>
                                            <a href="#">
                                            <i class="ti-arrow-circle-right"></i>
                                            Saiba Mais
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                            <?php
                            } else {

                                if($numRowsPG>0)
                                {
                                    while($row = sqlsrv_fetch_array($resultPG,SQLSRV_FETCH_ASSOC))
                                    {
                                        $nomeCursoPG = $row["nome_curso"];
                                        $descCursoPG = $row["desc_curso"];
                                        $imgCursoPG = $row["imagem_curso"];
                                        $tipoCursoPG = $row["tipo_curso"];
                                        $duracaoCursoPG = $row["duracao_curso"];
                                        $areaCursoPG = $row["desc_area"];
                                        $idCursoPG = $row["id_curso"];
                            ?> 
                                <div class="col-md-6">
                                    <div class="card" style="border: 1px solid #21a9af;margin-right:10px;margin-left:10px;margin-top:25px;">
                                        <img class="card-img-top" src="<?php echo $imgCursoPG;?>" width="100%" height="150px"  style="padding:15px;">
                                        <div class="card-header content">
                                            <h4 class="card-title" style="margin-bottom:-20mm;margin-top:-2mm;font-size:17px;color:#008B8B;padding-left:10px;height:100px"><?php echo utf8_encode($nomeCursoPG);?></h4>
                                        </div>
                                        <div class="card-footer text-right content">
                                            <hr>
                                            <a href="#">
                                            <i class="ti-arrow-circle-right"></i>
                                            Saiba Mais
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            <?php  
                                    }
                                }
                            }
                            ?> 
                        </div>
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

        	demo.initChartist(70,15,15);

        	$.notify({
            	icon: 'ti-comment-alt',
            	message: "Bem vindo! Aproveite para ver seus resultados."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</html>
