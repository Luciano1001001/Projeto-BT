<?php

	require_once "../config.php";
	

	//parte1
	
	$id_boleto = $_POST['id_boleto'];
	$id_pagamento_boleto = $_POST['id_pagamento_boleto'];
	$nosso_numero_boleto = $_POST['nosso_numero_boleto'];
	$nosso_numero_cnab_boleto = $_POST['nosso_numero_cnab_boleto'];
	$dt_emissao_boleto = $_POST['dt_emissao_boleto'];
	$dt_vencimento_boleto = $_POST['dt_vencimento_boleto'];
	$valor_boleto = $_POST['valor_boleto'];
	$especie_boleto = $_POST['especie_boleto'];
	$aceite_boleto = $_POST['aceite_boleto'];
	$cod_protesto_boleto = $_POST['cod_protesto_boleto'];
	$prazo_protesto_boleto = $_POST['prazo_protesto_boleto'];
	$num_parcela_boleto = $_POST['num_parcela_boleto'];
	$cod_moeda_boleto = $_POST['cod_moeda_boleto'];
	$informacao_boleto_3 = $_POST['informacao_boleto_3'];
	$informacao_boleto_4 = $_POST['informacao_boleto_4'];
	$informacao_boleto_5 = $_POST['informacao_boleto_5'];
	$informacao_boleto_6 = $_POST['informacao_boleto_6'];
	$informacao_boleto_7 = $_POST['informacao_boleto_7'];
	$id_lote = $_POST['id_lote'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Boleto();
	$Item->SetValues($id_boleto, $id_pagamento_boleto, $nosso_numero_boleto, $nosso_numero_cnab_boleto, $dt_emissao_boleto, $dt_vencimento_boleto, $valor_boleto, $especie_boleto, $aceite_boleto, $cod_protesto_boleto, $prazo_protesto_boleto, $num_parcela_boleto, $cod_moeda_boleto, $informacao_boleto_3, $informacao_boleto_4, $informacao_boleto_5, $informacao_boleto_6, $informacao_boleto_7, $id_lote); 
	
	
		
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
