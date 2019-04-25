<?php 

    include_once('banco.php');  
    session_start();

    $email = $_SESSION['email'];

    $bd = new MyBanco();
    $strcn = $bd->Conectar();

    if(!isset($_POST['txtRecuSenha'],$_POST['txtRecuConfSenha']))
    {
        header('location: esqueceu-senha.php?erro=1');
    }

    $sql = "SELECT userEmail_in_id 
            FROM tb_email 
            WHERE email_st_desc = '$email';";
    $param = array($email);
    $stmt = sqlsrv_query($strcn,$sql,$param,array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    $numRows = sqlsrv_num_rows($stmt);
    if($numRows>0)
    {
        while($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
        {
            $id = $row['userEmail_in_id'];
        }
    }
    
    $senha = $_POST['txtRecuSenha'];
    $confSenha = $_POST['txtRecuConfSenha'];

    if(strcmp($senha,$confSenha)!=0)
    {
        header('location: esqueceu-senha.php?senhaerro=1');
    } else { 
        $query = "  UPDATE tb_usuario
                    SET user_st_senha = HASHBYTES('SHA1',?)
                    WHERE user_in_id = ?";
        $params = array($senha,$id);
        $exe = sqlsrv_query($strcn,$query,$params);

        if(!$exe)
        {
            header('location: esqueceu-senha.php?erro=1');
        } else {
            header('location: login.php?sucesso=1');
        }
    }
?>