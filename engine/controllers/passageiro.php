<?php

	require_once "../config.php";
	

	//parte1
	
	$id_passageiro = $_POST['id_passageiro'];
	$id_cliente = $_POST['id_cliente'];
	$id_contrato = $_POST['id_contrato'];
	$menor_passageiro = $_POST['menor_passageiro'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Passageiro();
	$Item->SetValues($id_passageiro, $id_cliente, $id_contrato, $menor_passageiro); 
	
	
		
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
