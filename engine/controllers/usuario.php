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
		
			
			
			$res = $Item->Update();
			
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
