<?php 
    include_once('banco.php');  

    $bd = new MyBanco();

    $strcn = $bd->Conectar();

    session_start();

    if(!isset($_SESSION['logado']))
        header('Location: login.php');

    $log = $_SESSION['logado'];

    $sql = "SELECT user_bool_fezTeste as 't' FROM tb_usuario WHERE user_st_username = ?;";
    $params = array($log);
    $result = sqlsrv_query($strcn,$sql,$params,array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
        $teste = $row['t'];
    }
    

    if($teste == 1)
    {
        $sql1 = "SELECT * FROM v_relatorioResultado where username_user = ?";  
        $params1 = array($log);    
        $res = sqlsrv_query($strcn,$sql1,$params1,array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
        $nRows = sqlsrv_num_rows($res);
        if($nRows > 0)
        {
            while($linha = sqlsrv_fetch_array($res,SQLSRV_FETCH_ASSOC))
            {
                $nome = $linha['username_user'];
                $id_t = $linha['id_teste'];
                $dtI =  $linha['inicio_teste'];
                $dtF = $linha['final_teste'];
                $temp = $linha['tempo_resultado'];
                $percExatas = $linha['exatas_resultado'];
                $percHumanas = $linha['humanas_resultado'];
                $percBio = $linha['biologicas_resultado'];
                $cur = $linha['nome_curso'];
                $desc = $linha['desc_curso'];
                $imagem = $linha['img_curso'];
                $area = $linha['desc_area'];
                $duracao = $linha['duracao_curso'];
                $tipo = $linha['tipo_curso'];
            }
        } 
    }
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
    
    <script type="text/javascript">
        function stsTeste(){

            var t = "<?php echo $teste; ?>";
            var x = document.getElementById("testeN");
            var y = document.getElementById("testeS");

            x.style.display = "none";
            y.style.display = "none";

            if(t!=0)
            {
                x.style.display = "none";
                y.style.display = "block";
            } else {
                x.style.display = "block";
                y.style.display = "none";
            }
        }
    </script>

</head>
<body onload="stsTeste()">

    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="info">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="dashboard.php" class="simple-text">
                        <img src="assets/dashboard/img/Logo.png" width="100px" height="55px">
                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
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
                        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
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
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big text-center">
                                            <i class="ti-user" style="color: #21a9af"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers" style="margin-bottom:8mm;">
                                            <p><strong>Usuario</strong></p>
                                            <?php echo $log;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div><!--Aqui termina-->
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-info-alt" style="color: #21a9af"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p><strong>Status do teste</strong></p>
                                            <?php
                                                if($teste == 0)
                                                echo "<p class='text-warning' style='font-size:30px'>Não realizado</p>";
                                                else
                                                echo "<p class='text-success' style='font-size:30px'>Feito</p>";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Ultimo teste feito em 
                                        <?php 
                                            if(empty($dtF)==true)
                                            echo "";
                                            else
                                            echo $dtF->format('d-m-Y');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-bar-chart-alt" style="color: #21a9af"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <div class="numbers">
                                                <p><strong>Porcentagem de compatibilidade</strong></p>
                                            </div>   
                                            <div class="col-md-3">
                                                <div class="numbers" style="margin-left:-10mm;">
                                                    <p>Exatas</p>
                                                    <?php
                                                        if(empty($percExatas)==false)
                                                        echo "<p class='text-success' style='font-size: 30px'>".($percExatas*100)."%"."</p>";
                                                        else
                                                        echo "<p class='text-success' style='font-size: 30px'>0%</p>";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="numbers">
                                                    <p>Humanas</p>
                                                    <?php
                                                        if(empty($percExatas)==false)
                                                        echo "<p class='text-success' style='font-size: 30px'>".($percHumanas*100)."%"."</p>";
                                                        else
                                                        echo "<p class='text-success' style='font-size: 30px'>0%</p>";
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="numbers">
                                                    <p>Biologicas</p>
                                                    <?php
                                                        if(empty($percExatas)==false)
                                                        echo "<p class='text-success' style='font-size: 30px'>".($percBio*100)."%"."</p>";
                                                        else
                                                        echo "<p class='text-success' style='font-size: 30px'>0%</p>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12" id="testeN">
                        <div class="card">
                            <div class="header">
                                <h2 class="title text-center">Você ainda não fez nosso teste?</h2>
                            </div>
                            <div class="content card-body">
                                <p class="sub-title text-center">Faça o teste em nosso app e venha ver os seus resultados com a gente. Seu futuro faz parte do nosso futuro</p>    
                                <div class="content text-center">
                                    <img src="assets/dashboard/img/google-play-badge.png" width="250px" height="100px">
                                    <a class="btn btn-primary btn-lg" href="https://play.google.com/store" target="_blank">Baixar Agora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="testeS">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Curso com maior compatibilidade</h4>
                            <h2><?php echo utf8_encode($cur);?></h2>        
                            <hr>
                        </div>
                        <div class="content">  
                            <div class="card-body" style="background-image: url(C:/xampp/htdocs/Top/assets/dashboard/img/ImagemCurso/<?php echo $imagem;?>);background-position:center;background-size:cover;background-repeat:no-repeat;height:100mm;"></div>       
                        </div>                                                          
                    </div>
                </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h2 class="title">A profissão</h2>
                        <p class="category">Alguns detalhes dessa profissão</p>
                        <hr>
                    </div>
                    <div class="content card-body" style="margin-top: -5mm">
                        <h5 class="title"><strong>Descrição</strong></h5>
                        <p class="simple-text"><?php echo utf8_encode($desc); ?></p>
                        <hr>
                        <h5 class="title"><strong>Área de formação</strong></h5>
                        <p class="simple-text"><?php echo $area; ?></p>
                        <hr>
                        <h5 class="title"><strong>Tipo do curso</strong></h5>
                        <p class="simple-text">
                        <?php
                            if(strcmp($tipo,'G'))
                            echo "Graduação";
                            else
                            echo "Pós-graduação"; 
                        ?>
                        </p>
                        <hr>
                        <h5 class="title"><strong>Duração média do curso</strong></h5>
                        <p class="simple-text"><?php echo $duracao;?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="header">
                        <h2 class="title">Instituição com a melhor avaliação nesse curso</h2>
                        <p class="category">Alguns detalhes dessa instituição</p>
                        <hr>
                    </div>
                    <?php

                        $consulta = "SELECT nome_facul,estado_facul,valor_notaMec,site_facul FROM v_relatorioResultado WHERE valor_notaMec IN (3,4,5) ORDER BY valor_notaMec ASC";
                        $query = sqlsrv_query($strcn,$consulta,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
                        if(sqlsrv_num_rows($query)>0)
                        {
                            while($reg = sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC))
                            {
                                $nomeFac = $reg['nome_facul'];
                                $estadoFac = $reg['estado_facul'];
                                $valorMec = $reg['valor_notaMec'];
                                $siteFacul = $reg['site_facul'];
                            }
                        }
                    ?>
                    <div class="content card-body" style="margin-top: -8mm">
                        <h5 class="title"><strong>Nome</strong></h5>
                        <p class="simple-text"><?php echo utf8_encode($nomeFac);  ?></p>
                        <hr>
                        <h5 class="title"><strong>Localização</strong></h5>
                        <p class="simple-text"><?php echo utf8_encode($estadoFac); ?></p>
                        <hr>
                        <h5 class="title"><strong>Nota do MEC</strong></h5>
                        <p class="simple-text"><?php echo $valorMec; ?></p>
                    </div>
                    <div class="footer">
                        <hr>
                        <div class="content stats">
                            <a class="ti-eye"></i>
                                <a href="<?php echo $siteFacul;?>" target="_blank">Visitar site</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Estatisticas do resultado</h4>
                            <p class="category">Do ultimo teste feito</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                <div class="chart-legend">
                                    <i class="fa fa-circle text-info"></i> Exatas
                                    <i class="fa fa-circle text-danger"></i> Humanas
                                    <i class="fa fa-circle text-warning"></i> Biologicas
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
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

        var exatas = "<?php echo $percExatas; ?>";
        var humanas = "<?php echo $percHumanas; ?>";
        var bio = "<?php echo $percBio; ?>";

       demo.initChartist(exatas*100,bio*100,humanas*100);

       $.notify({
           icon: 'ti-gift',
           message: "Bem vindo <b><?php echo $log; ?></b>"

       },{
        type: 'success',
        timer: 4000
    });

   });
</script>

</html>
