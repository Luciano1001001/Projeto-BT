<?php

	require_once "../config.php";
	

	//parte1
	
	$id_cliente = $_POST['id_cliente'];
	$nome_cliente = $_POST['nome_cliente'];
	$cpf_cliente = $_POST['cpf_cliente'];
	$rg_cliente = $_POST['rg_cliente'];
	$dtnascimento_cliente = $_POST['dtnascimento_cliente'];
	$endereco_cliente = $_POST['endereco_cliente'];
	$cidade_cliente = $_POST['cidade_cliente'];
	$estado_cliente = $_POST['estado_cliente'];
	$cep_cliente = $_POST['cep_cliente'];
	$email_cliente = $_POST['email_cliente'];
	$telfixo_cliente = $_POST['telfixo_cliente'];
	$celular_cliente = $_POST['celular_cliente'];
	$dtcadastro_cliente = $_POST['dtcadastro_cliente'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Cliente();
	$Item->SetValues($id_cliente, $nome_cliente, $cpf_cliente, $rg_cliente, $dtnascimento_cliente, $endereco_cliente, $cidade_cliente, $estado_cliente, $cep_cliente, $email_cliente, $telfixo_cliente, $celular_cliente, $dtcadastro_cliente); 
	
	
		
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
