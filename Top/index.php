<?php
    include_once('banco.php');  

    $bd = new MyBanco();

    $strcn = $bd->Conectar();

    $sql = "SELECT TOP(6) * FROM tb_avaliacao av
            JOIN tb_usuario us ON av.user_in_id = us.user_in_id
            JOIN tb_teste t ON av.test_in_id = t.teste_in_id
            JOIN v_relatorioResultado r ON t.teste_in_id = r.id_teste
            WHERE t.teste_bool_novoTeste = 1
            ORDER BY t.teste_dt_final DESC,av.ava_in_ratings DESC";
    $result = sqlsrv_query($strcn,$sql);
    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TOP - Teste de orientação profissional</title>

  <link rel = "shortcut icon" type = "imagem/x-icon" href = "assets/cadastro/img/Logo.png"/>
  <link href="assets/index/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
  <link href="assets/index/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="assets/index/css/creative.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="assets/avalia/css/styles.css">
  <link rel="stylesheet" href="assets/avalia/css/Testimonials.css">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/index/img/Logo.png" width="90px" height="45px"  /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="login.php">Entrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- Header --> 
  <header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h1 class="text-uppercase">
            <strong>O Futuro é agora</strong>
          </h1>
          <hr>
        </div>
        <div class="col-lg-8 mx-auto">
          <p class="text-faded mb-5">Venha fazer nosso teste de orientação profissional e descubra qual profissão é a sua cara!</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="tela-cadastro.php">Começar agora</a>
        </div>
      </div>
    </div>
  </header>

<!-- O que somos --> 
  <section id="about" style="background-color: white;border-bottom: 5px dotted #21a9af">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">O que é o TOP?</h2>
          <hr class="light my-4">
          <p class="text-muted mb-0">TOP (Teste de Orientação Profissional) é um teste, semelhante a um questionario, que tem objetivo de combinar seu perfil e suas respostas, comparar seus resultados com as diversas áreas e cursos trazendo a profissão que mais combina
            com você.</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services" style="border: 1px solid #21a9af;margin-top: 10mm;">Saber mais</a>
        </div>
      </div>
    </div>
  </section>

<!-- Informações do TOP -->  
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Conheça um pouco sobre a nossa plataforma</h2>
          <hr class="light my-4">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fas fa-mobile-alt text-primary mb-3 sr-icon-1"></i>
            <h3 class="mb-3">Disponível para todos</h3>
            <p class="text-muted mb-0">O nosso aplicativo está disponivel na play store. O teste é livre para crianças, adolescentes e adultos, que tenham interesse em descobrir a área de atuação que mais se identificam.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-paper-plane text-primary mb-3 sr-icon-2"></i>
            <h3 class="mb-3">Nosso foco é seu sucesso</h3>
            <p class="text-muted mb-0">Disponibilizamos diversas informações de cursos de graduação e pós-graduação. Mostramos faculdades com o melhor conceito do mec no curso desejado. Isso tudo para tornar a sua escolha a melhor para o seu futuro.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-eye-slash text-primary mb-3 sr-icon-3"></i>
            <h3 class="mb-3">Informações seguras</h3>
            <p class="text-muted mb-0">Suas informações pessoais, preferencias e resultados de testes estão seguros e jamais serão compartilhados sem a sua autorização.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="service-box mt-5 mx-auto">
            <i class="fas fa-4x fa-thumbs-up text-primary mb-3 sr-icon-4"></i>
            <h3 class="mb-3">Diferencial</h3>
            <p class="text-muted mb-0">Nosso teste possui uma formula diferenciada para calcular a compatibilidade de cada pessoa com uma carreira profissional. Isso faz com que o resultado seja confiável e eficaz.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Avaliação --> 
  <section class="testimonials-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Avaliações de usuários</h2>
                <hr class="light my-4">
                <p class="text-center">Avaliações de pessoas que fizeram o teste e gostaram de seu resultado.</p>
            </div>
            <div class="row people">
            <?php
                while($row = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){
                  $nome = $row["user_st_nome"];
                  $username = $row["user_st_username"];
                  $img = $row["user_img_avatar"];
                  $curso = $row["nome_curso"];
                  $ratings = $row["ava_in_ratings"];
                  $comentario = $row["ava_st_comentario"];
            ?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description"><?php echo utf8_encode($comentario); ?></p>
                        <br><br>
                        <?php
                            $i = 0;
                            while($i < $ratings)
                            {
                        ?>
                        <i class="fa fa-star fa-lg" style="color:Gold"></i>
                        <?php
                             $i+=1;  
                            } 
                        ?>
                    </div>
                    <?php
                        if($img == null)
                        {
                    ?>
                        <div class="author"><img class="rounded-circle" src="assets/index/img/defaultAvatar.png"> 
                    <?php        
                        } else {
                    ?>
                    <div class="author"><img class="rounded-circle" src="assets/dashboard/img/Fotos/<?php echo $img; ?>">
                    <?php } ?>
                        <h5 class="name"><?php echo utf8_encode($nome); ?></h5>
                        <p class="title">Resultado: <?php echo utf8_encode($curso); ?></p>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </div>
        </div>
  </section>

<!-- Nosso APP --> 
  <section class="bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4 text-uppercase">Em breve nosso app estará disponivel!</h2>
      <hr>
      <img src="assets/index/img/google-play-badge.png" width="250px" height="100px">
      <a class="btn btn-light btn-xl sr-button" href="https://drive.google.com/file/d/1k1DImYmRzhaR7BcWbraRtDQOyFDlUIZz/view?usp=sharing" target="_blank">Baixar Agora</a>
    </div>
  </section>

<!-- Footer --> 
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="section-heading">Compartilhe conosco sua avaliação!</h2>
          <hr class="light my-4">
          <p class="mb-5">Sua participação é de grande importancia! Pois nos ajuda a melhorar e a continuar ajudando pessoas com suas carreiras.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 sr-contact-1"></i>
          <p>(11) 1234 - 5678</p>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 sr-contact-2"></i>
          <p>
            <a>suporte@testetop.online</a>
          </p>
        </div>
      </div>
      <footer style="text-align: center;margin-bottom: -25mm;padding-top: 15mm">
        <p class="copyright" style="color:#212529">EduTech © 2018 - 2019</p>
    </footer>
    </div>
  </section>
  
  <script src="assets/index/vendor/jquery/jquery.min.js"></script>
  <script src="assets/index/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/index/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/index/vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="assets/index/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="assets/index/js/creative.min.js"></script>

</body>

</html>
