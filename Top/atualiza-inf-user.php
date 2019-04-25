<?php

    session_start();

    $user = $_SESSION['logado'];

    include_once('banco.php');
    
    $bd = new MyBanco();

    $strcn = $bd->Conectar();
    $userId = $bd->RetornarID($user);

    if(isset($_FILES["avatar"])){
        $arquivo = $_FILES["avatar"];
        //diretorio dos arquivos
        $pasta_dir = "C:/xampp/htdocs/Top/assets/dashboard/img/Fotos/";
        // Faz o upload da imagem
        $arquivo_nome = $pasta_dir . $arquivo['name'];
        //salva na pasta
        move_uploaded_file($arquivo['tmp_name'], $arquivo_nome);
    }

    function getFile($arquivo){
        $file = pathinfo($arquivo);
        return $file['basename'];
    }

    $email = $_POST['email'];
    $nivel = $_POST['select-nivel'];
    $cid = $_POST['txtCidade'];
    $uf = $_POST['select-uf'];
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];
    $bio = $_POST['bio'];

    $ft = getFile($arquivo['name']);

    $sql = "EXEC sp_atualizaCadastro 
            @puserId = ?,
		    @pemailDesc = ?,
		    @pnivelAcad = ?,
		    @pcidade = ?,
		    @puf = ?,
		    @pcontDescTel = ?,
            @pcontDescCel = ?,
            @pftuser = ?,
            @pbio = ?";
    $params = array($userId,$email,$nivel,$cid,$uf,$tel,$cel,$ft,$bio);
    $result = sqlsrv_query($strcn,$sql,$params);

    if(!$result){
        echo "<script>alert('Erro na atualização!!');</script>";
        header('Location: perfil.php?err=1');
    } else {
        echo "<script>alert('Atualizado com sucesso!');</script>";
        header('Location: perfil.php?');
    }

    sqlsrv_close($strcn);

?>