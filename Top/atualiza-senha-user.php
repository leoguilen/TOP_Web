<?php  

    include_once('banco.php');

    session_start();
    
    $user = $_SESSION['logado'];

    $bd = new MyBanco();
    $cnx = $bd->Conectar();

    $senha = $_POST['txtSenhaAtual'];
    $senhaNova = $_POST['txtSenhaNova'];
    $confSenha = $_POST['txtConfSenha'];

    $slctSenha = "SELECT * FROM tb_usuario WHERE user_st_senha = HASHBYTES('sha1','$senha');";
    $querySenha = sqlsrv_query($cnx,$slctSenha);

    if(!(sqlsrv_has_rows($querySenha))){
        header('Location: alterarSenha.php?err=1');
    } else {
        if(strcasecmp($senhaNova,$confSenha) != 0){
            header('Location: alterarSenha.php?err=1');
        } else {
            $sql = "UPDATE tb_usuario SET user_st_senha = HASHBYTES('SHA1',?) WHERE user_st_username = ?;";
            $params = array($senhaNova,$user);
            $stmt = sqlsrv_query($cnx,$sql,$params);

            sqlsrv_close($cnx);
            header('Location: alterarSenha.php');
        }
    } 
?>