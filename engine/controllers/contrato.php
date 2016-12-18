<?php

	require_once "../config.php";
	

	//parte1
	
	$id_contrato = $_POST['id_contrato'];
	$id_contratante = $_POST['id_contratante'];
	$dt_contrato = $_POST['dt_contrato'];
	$valor_contrato = $_POST['valor_contrato'];
	$pacote_contrato = $_POST['pacote_contrato'];
	$numero_contrato = $_POST['numero_contrato'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Contrato();
	$Item->SetValues($id_contrato, $id_contratante, $dt_contrato, $valor_contrato, $pacote_contrato, $numero_contrato); 
	
	
		
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
