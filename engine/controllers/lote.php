<?php

	require_once "../config.php";
	

	//parte1
	
	$id_lote = $_POST['id_lote'];
	$controle_lote = $_POST['controle_lote'];
	$informacao_1_lote = $_POST['informacao_1_lote'];
	$informacao_2_lote = $_POST['informacao_2_lote'];
	$num_remessa_lote = $_POST['num_remessa_lote'];
	$quant_registros_lote = $_POST['quant_registros_lote'];
	$quant_cob_simples_lote = $_POST['quant_cob_simples_lote'];
	$valor_cob_simples_lote = $_POST['valor_cob_simples_lote'];
	$quant_cob_vinculada_lote = $_POST['quant_cob_vinculada_lote'];
	$valor_cob_vinculada_lote = $_POST['valor_cob_vinculada_lote'];
	$quant_cob_caucionada_lote = $_POST['quant_cob_caucionada_lote'];
	$valor_cob_caucionada_lote = $_POST['valor_cob_caucionada_lote'];
	$quant_cob_descontada_lote = $_POST['quant_cob_descontada_lote'];
	$valor_cob_descontada_lote = $_POST['valor_cob_descontada_lote'];
	$id_arquivo = $_POST['id_arquivo'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Lote();
	$Item->SetValues($id_lote, $controle_lote, $informacao_1_lote, $informacao_2_lote, $num_remessa_lote, $quant_registros_lote, $quant_cob_simples_lote, $valor_cob_simples_lote, $quant_cob_vinculada_lote, $valor_cob_vinculada_lote, $quant_cob_caucionada_lote, $valor_cob_caucionada_lote, $quant_cob_descontada_lote, $valor_cob_descontada_lote, $id_arquivo); 
	
	
		
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
