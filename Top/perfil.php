<?php 

    include_once('banco.php');  

    $bd = new MyBanco();

    $strcn = $bd->Conectar();

    session_start();

    if(!isset($_SESSION['logado']))
        header('Location: login.php');

    $user = $_SESSION['logado'];

    if(isset($_GET['err'])==1)
        $err = 1;
    else 
        $err = 0;
    
    $sql = "SELECT  email_st_desc AS 'Email',
                    nivelAcad_in_id as 'n_ID',
                    nivelAcad_st_desc AS 'Nivel',
                    user_st_cidade as 'Cidade',
                    user_st_uf as 'UF',
                    tipoCont_st_desc AS 'Tipo',
                    cont_st_desc AS 'Cont',
                    user_st_nome as 'Nome',
                    user_img_avatar as 'Img',
                    user_st_bio as 'Bio'
                    FROM tb_usuario u
            JOIN tb_email e 
            ON u.user_in_id = e.userEmail_in_id
            JOIN tb_nivelAcademico n 
            ON n.nivelAcad_in_id = u.user_in_nivelAcad
            JOIN tb_contato c 
            ON u.user_in_id = c.userCont_in_id
            JOIN tb_tipocontato t 
            ON c.tipoCont_in_id = t.tipoCont_in_id
            where u.user_st_username = ?;";
    $params = array($user);
    $result = sqlsrv_query($strcn,$sql,$params,array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRows = sqlsrv_num_rows($result);
    if($numRows>0)
    {
        while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
        {
            $email = $row["Email"];
            $nome = $row["Nome"];
            $nivel = $row["Nivel"];
            $id = $row["n_ID"];
            $cid = $row["Cidade"];
            $uf = $row["UF"];
            $img = $row["Img"];
            $bio = $row["Bio"];

            if(strcmp($row["Tipo"], "Telefone") == 0)
            {
                $tel = $row["Cont"];
            }
            if(strcmp($row["Tipo"], "Celular") == 0)
            {
                $cel = $row["Cont"];
            }
        }
    }
    sqlsrv_close($strcn);

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
                    <li class="active">
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
                        <a class="navbar-brand" href="dashboard.html">Configurações do perfil</a>
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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image" style="margin-bottom:-15mm">
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="assets/dashboard/img/Fotos/<?php echo $img;?>" alt="...">
                                  <h4 class="title"><?php echo $nome;?><br />
                                     <a><small><?php echo "@".$user; ?></small></a>
                                  </h4>                                </div>
                                <p class="description text-center">
                                    <?php echo $bio;?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <form name="frm-atualizaPerfil" action="atualiza-inf-user.php" method="post" enctype="multipart/form-data">
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar perfil</h4>
                                <hr>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Username" value="<?php echo $user; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control border-input" name="email" placeholder="Email" value="<?php echo $email;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Foto de perfil</label>
                                                <input type="file" class="form-control border-input" name="avatar" accept=".jpg, .jpeg, .png" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nivel academico</label>
                                                <select class="form-control border-input" id="select-nivel" name="select-nivel" required>
                                                    <option value="<?php echo $id;?>" hidden><?php echo utf8_encode($nivel);?></option>
                                                    <option value="1">Fundamental - Incompleto</option>
                                                    <option value="2">Fundamental - Completo</option>
                                                    <option value="3">Médio - Incompleto</option>
                                                    <option value="4">Médio - Completo</option>
                                                    <option value="5">Superior - Incompleto</option>
                                                    <option value="6">Superior - Completo</option>
                                                    <option value="7">Pós-graduação - Incompleto</option>
                                                    <option value="8">Pós-graduação - Completo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Cidade</label>
                                                <input type="text" class="form-control border-input" name="txtCidade" placeholder="Cidade" value="<?php echo utf8_encode($cid);?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>UF</label>
                                                <select class="form-control border-input" id="select-one" name="select-uf" required>
                                                <option value="<?php echo $uf; ?>" hidden><?php echo $uf; ?></option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AM">AM</option>
                                                <option value="AP">AP</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MG">MG</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="PR">PR</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="RS">RS</option>
                                                <option value="SC">SC</option>
                                                <option value="SE">SE</option>
                                                <option value="SP">SP</option>
                                                <option value="TO">TO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="tel" class="form-control border-input" name="tel" minlength="10" maxlength="11" placeholder="Telefone" value="<?php echo $tel; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="tel" class="form-control border-input" name="cel" minlength="10" maxlength="11" placeholder="Telefone" value="<?php echo $cel; ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <textarea rows="5" class="form-control border-input" name="bio" placeholder="Crie sua Bio"><?php echo $bio; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="btnAtualiza" class="btn btn-info btn-fill btn-wd">Atualizar</button>
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
                        message: "Erro ao atualizar!"
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
