	<?php

	include_once('banco.php');	

	$bd = new MyBanco();

	$strcn = $bd->Conectar();

	if(isset($_POST["nome"],
	$_POST["email"],
	$_POST["Sexo"],
	$_POST["dtNasc"],
	$_POST["txtUsername"],
	$_POST["txtSenha"],
	$_POST["txtConfirmarSenha"],
	$_POST["txtCidade"],
	$_POST["select-uf"],
	$_POST["select-nivel"],
	$_POST["txtTel"],
	$_POST["txtCel"]))
	{		
		header('Location: tela-cadastro.php?erro=1');
	}

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$sexo = $_POST['Sexo'];
	$dtnasc = $_POST['dtNasc'];
	$user = $_POST['txtUsername'];
	$senha = $_POST['txtSenha'];
	$cidade = $_POST['txtCidade'];
	$uf = $_POST['select-uf'];
	$nivel = $_POST['select-nivel'];
	$tel = $_POST['txtTel'];
	$cel = $_POST['txtCel'];

	$cad = $bd->Cadastrar($nome,$email,$sexo,$dtnasc,$user,$senha,$uf,$cidade,$nivel,0,$tel,$cel);
	
	if($cad==1)
	{
		session_start();
		$_SESSION['logado'] = $user;
		header('Location: dashboard.php');
	} else {

		unset($_SESSION['logado']);
		header('Location: tela-cadastro.php?erro=1');
	}

?>


