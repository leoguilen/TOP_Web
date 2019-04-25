<?php
	include_once('banco.php');

    $bd = new MyBanco();

	if ( !isset($_POST['nome'], $_POST['senha']) ) {

		die ('Usuario e/ou senha não preenchidos!');
	}

  $nome = $_POST['nome'];
  $senha = $_POST['senha'];
  $cnx = $bd->Conectar();
  echo "Status: ".$cnx."<br>";
	if(!$cnx)
	{
      echo "Conexão com o banco falhou";

	} else {
      
      $result = $bd->ValidarLogin($nome,$senha);

        if($result!=1){

          header("location: login.php?erro=1");

        }else{

            session_start();
            
            $_SESSION['logado'] = $nome;

            header("location: dashboard.php");

            
        }
    }
	
?>