<?php
    
    if(isset($_GET['erro'])==1)
    {
        $result = 1;

    } else {

        $result = 0;
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
    <link rel="stylesheet" href="assets/cadastro/css/styles.css">
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

        function voltaErro()
        {
            $("#erro").hide();

            if(res==1)
            {
                $("#erro").show();
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
            <div class="card bg-white col-lg-6 mx-auto" style="padding: 35px">
            <form class="bootstrap-form needs-validation" name="form-cadastro" action="validar_cadastro.php" method="post" novalidate>
                <h2 class="text-center">
                    <img src="assets/cadastro/img/Logo.png" style="margin-bottom: 5mm;width: 120px;">
                    <h5 class="text-monospace text-center">Formulario de cadastro</h5>
                </h2>
                <div class="alert alert-danger" id="erro"><strong>Cadastro não teve sucesso</strong> verifique se seus dados estão corretos</div>               
                <div class="form-group">
                    <p style="color: black">Nome</p>
                    <input type="text" class="form-control border-input" id="nome" name="nome" placeholder="Nome" autocomplete="false" required>
                    <div class="invalid-feedback">Esse campo não pode ser vazio ou conter numeros</div>
                    <hr>
                </div>
                <div class="form-group">
                    <p style="color: black">Email</p>
                    <input type="text" class="form-control border-input" id="email" name="email" placeholder="Email" autocomplete="false" required>
                    <div class="invalid-feedback">Esse campo não pode ser vazio e deve ser em um formato de email</div>
                    <hr>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 ">
                        <p style="color: black">Sexo</p>
                        <div class="form-check">
                            <label class="form-check-label" for="radioM" style="margin-left:-3mm">Masculino</label>
                            <input class="form-check-input" type="radio" name="Sexo" value="M" id="radioM" style="margin-left:2.1mm" required>
                            <br>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="radioF" style="margin-left:-3mm">Feminino</label>
                            <input class="form-check-input" type="radio" name="Sexo" value="F" id="radioF" style="margin-left:4.5mm" required>
                            <div class="invalid-feedback">Selecione uma opcao</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <p style="color: black">Data de nascimento</p>
                            <input class="form-control border-input" type="date" id="dtNasc" name="dtNasc" placeholder="Data de nascimento" autocomplete="false" style="margin-top:4mm" required>
                            <div class="invalid-feedback">Data inserida é invalida</div>
                        </div>
                    </div>
                    <hr>
                </div>
                    
                <div class="form-group">
                    <p style="color: black">Username</p>
                    <input type="text" class="form-control border-input" id="txtUsername" name="txtUsername" placeholder="Username" autocomplete="false" required>
                    <div class="invalid-feedback"></div>
                    <hr>
                </div>
                <div class="form-group">
                    <p style="color: black">Senha</p>
                    <input type="password" class="form-control border-input" id="txtSenha" name="txtSenha" placeholder="Senha" autocomplete="false" required>
                    <div class="invalid-feedback"></div>
                    <hr>
                </div>
                <div class="form-group">
                    <p style="color: black">Confirmar senha</p>
                    <input type="password" class="form-control border-input" id="txtConfirmaSenha" name="txtConfirmaSenha" placeholder="Confirmar senha" autocomplete="false" required>
                    <div class="invalid-feedback"></div>
                    <hr>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <p style="color: black">Cidade</p>
                        <input class="form-control border-input" type="text" name="txtCidade" placeholder="Cidade" required>
                    </div>
                    <div class="col-md-3">
                        <p style="color: black">UF</p>
                        <select class="form-control border-input" id="select-one" name="select-uf" style="height:10.5mm" required>
                            <option value="">Selecione uma UF</option>
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
                        <div class="invalid-feedback">Digite a cidade e Selecione uma UF</div>
                    <hr>
                </div>
                <div class="form-group">
                    <p style="color: black">Nivel Academico</p>
                    <select class="form-control border-input" id="select-nivel" name="select-nivel" style="height:10.5mm" required>
                        <option value="">Selecione um nivel</option>
                        <option value="1">Fundamental - Incompleto</option>
                        <option value="2">Fundamental - Completo</option>
                        <option value="3">Médio - Incompleto</option>
                        <option value="4">Médio - Completo</option>
                        <option value="5">Superior - Incompleto</option>
                        <option value="6">Superior - Completo</option>
                        <option value="7">Pós-graduação - Incompleto</option>
                        <option value="8">Pós-graduação - Completo</option>
                    </select>
                    <div class="invalid-feedback">Selecione seu nivel academico</div>
                    <hr>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <p style="color: black">Telefone</p>
                        <input class="form-control border-input" type="text" name="txtTel" placeholder="Telefone" autocomplete="off" minlength="10" maxlength="11" required>
                    </div>
                    <div class="col">
                        <p style="color: black">Celular</p>
                        <input class="form-control border-input" type="text" name="txtCel" placeholder="Celular" autocomplete="off" minlength="11" maxlength="11" required>
                    </div>
                    <div class="row invalid-feedback" style="margin-left: 15px">Digite seus numeros corretamente</div>
                </div>
                <hr>
                <div class="form-group" >
                    <button class="btn btn-primary btn-outline-info btn-block" type="submit">Cadastrar</button>
                </div>
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
  
</body>

</html>