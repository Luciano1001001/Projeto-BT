<?php

	require_once "../config.php";


	//parte1

	$id_usuario = $_POST['id_usuario'];
	$nivel_usuario = $_POST['nivel_usuario'];
	$nome_usuario = $_POST['nome_usuario'];
	$email_usuario = $_POST['email_usuario'];
	$senha_usuario = $_POST['senha_usuario'];
	$telfixo_usuario = $_POST['telfixo_usuario'];
	$celular_usuario = $_POST['celular_usuario'];


	//parte2
	$action = $_POST['action'];

	//parte3
	$Item = new Usuario();
	$Item->SetValues($id_usuario, $nivel_usuario, $nome_usuario, $email_usuario, $senha_usuario, $telfixo_usuario, $celular_usuario);



	//parte4
	switch($action) {
		case 'create':

		$Item->SetValues($id_usuario, $nivel_usuario, $nome_usuario, $email_usuario, sha1($senha_usuario), $telfixo_usuario, $celular_usuario);

			$res = $Item->Create();
			if ($res === NULL) {
				$res = "true";
			}
			else {
				$res = "false";
			}

			echo $res;


		break;

		case 'update':

		$Usuario = new Usuario();
		$Usuario = $Usuario->Read($id_usuario);
		if($Usuario['senha_usuario']===$senha_usuario){ // se a senha nao foi alterada
			$res = $Item->Update();
		}
		else{
			$Item->SetValues($id_usuario, $nivel_usuario, $nome_usuario, $email_usuario, sha1($senha_usuario), $telfixo_usuario, $celular_usuario);
			$res = $Item->Update();
		}


			if ($res === NULL) {
				$res= 'true';
			}
			else {
				$res = 'false';
			}
			echo $res;


		break;

		case 'delete':



			$res = $Item->Delete();
			if ($res === NULL) {
				$res= 'true';
			}
			else {
				$res = 'false';
			}
			echo $res;


		break;



	}
?>
