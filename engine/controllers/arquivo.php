<?php

	require_once "../config.php";
	

	//parte1
	
	$id_arquivo = $_POST['id_arquivo'];
	$id_empresa = $_POST['id_empresa'];
	$cod_arquivo = $_POST['cod_arquivo'];
	$dt_geracao_arquivo = $_POST['dt_geracao_arquivo'];
	$quant_lotes_arquivo = $_POST['quant_lotes_arquivo'];
	$quant_registros_arquivo = $_POST['quant_registros_arquivo'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Arquivo();
	$Item->SetValues($id_arquivo, $id_empresa, $cod_arquivo, $dt_geracao_arquivo, $quant_lotes_arquivo, $quant_registros_arquivo); 
	
	
		
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
