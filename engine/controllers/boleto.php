<?php

	require_once "../config.php";
	

	//parte1
	
	$id_boleto = $_POST['id_boleto'];
	$id_pagamento_boleto = $_POST['id_pagamento_boleto'];
	$id_cliente_pagador_boleto = $_POST['id_cliente_pagador_boleto'];
	$id_cliente_avalista_boleto = $_POST['id_cliente_avalista_boleto'];
	$dt_processamento_boleto = $_POST['dt_processamento_boleto'];
	$dias_pagamento_boleto = $_POST['dias_pagamento_boleto'];
	$especie_doc_boleto = $_POST['especie_doc_boleto'];
	$nosso_numero_boleto = $_POST['nosso_numero_boleto'];
	$valor_liquido_boleto = $_POST['valor_liquido_boleto'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Boleto();
	$Item->SetValues($id_boleto, $id_pagamento_boleto, $id_cliente_pagador_boleto, $id_cliente_avalista_boleto, $dt_processamento_boleto, $dias_pagamento_boleto, $especie_doc_boleto, $nosso_numero_boleto, $valor_liquido_boleto); 
	
	
		
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
