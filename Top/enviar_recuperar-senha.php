<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

    if(!isset($_POST['txtRecuSenha']))
    {
        header('Location: esqueceu-senha.php?erro=1');
    }
    $email = $_POST['txtRecuSenha'];
    $numValida = rand(100,99999);
    
$mail               = new PHPMailer();
$body               = "<h2>Olá, vamos ajuda-lo a recuperar sua senha, ok?</h2><br><h5>Clique no link abaixo para mudar sua senha</h5>
                        <br><a href='http://testetop.localhost:8080/formAlterarSenha.php?v@l1dAteNumb3r=ok$numValida'>Mudar Senha</a><p>Att<br>Equipe de suporte do top</p>";
$mail->IsSMTP();                                        // telling the class to use SMTP
$mail->SMTPDebug    = 1;                                // enables SMTP debug information (for testing)
$mail->SMTPAuth     = true;                             // enable SMTP authentication
$mail->SMTPSecure   = "tls";                            // sets the prefix to the servier
$mail->Host         = "smtp.gmail.com";                 // sets GMAIL as the SMTP server
$mail->Port         = 587;                              // set the SMTP port for the GMAIL server

$mail->Username     = "leonardoguilen1@gmail.com"  ;           // GMAIL username
$mail->Password     = 'Senha2017#' ;           // GMAIL password

$mail->SetFrom("suporte@testetop.com");
$mail->Subject = "Recuperar Senha";
$mail->MsgHTML($body);
$address = $email;
$mail->AddAddress($address);

// $mail->AddAttachment("images/phpmailer.gif");        // attachment
// $mail->AddAttachment("images/phpmailer_mini.gif");   // attachment

if(!$mail->Send()) {
    header('Location: esqueceu-senha.php?erro=1');
} 
else {
    session_start();

    $_SESSION['email'] = $email;

    header('Location: esqueceu-senha.php?sucesso=1');
}
?>