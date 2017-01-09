<?php

	require_once "../config.php";
	

	//parte1
	
	$id_taxa = $_POST['id_taxa'];
	$id_pagamento = $_POST['id_pagamento'];
	$natureza_taxa = $_POST['natureza_taxa'];
	$cod_taxa = $_POST['cod_taxa'];
	$dt_aplica_taxa = $_POST['dt_aplica_taxa'];
	$multiplicador_taxa = $_POST['multiplicador_taxa'];
	$valor_taxa = $_POST['valor_taxa'];
	$descricao_taxa = $_POST['descricao_taxa'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Taxa();
	$Item->SetValues($id_taxa, $id_pagamento, $natureza_taxa, $cod_taxa, $dt_aplica_taxa, $multiplicador_taxa, $valor_taxa, $descricao_taxa); 
	
	
		
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
