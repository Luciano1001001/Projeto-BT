<?php

	require_once "../config.php";
	

	//parte1
	
	$id_pagamento = $_POST['id_pagamento'];
	$forma_pagamento = $_POST['forma_pagamento'];
	$condicao_pagamento = $_POST['condicao_pagamento'];
	$dt_inicio_pagamento = $_POST['dt_inicio_pagamento'];
	$quant_parcelas_pagamento = $_POST['quant_parcelas_pagamento'];
	$valor_liquido_pagamento = $_POST['valor_liquido_pagamento'];
	$valor_taxas_pagamento = $_POST['valor_taxas_pagamento'];
	$valor_total_pagamento = $_POST['valor_total_pagamento'];
	$id_contrato = $_POST['id_contrato'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Pagamento();
	$Item->SetValues($id_pagamento, $forma_pagamento, $condicao_pagamento, $dt_inicio_pagamento, $quant_parcelas_pagamento, $valor_liquido_pagamento, $valor_taxas_pagamento, $valor_total_pagamento, $id_contrato); 
	
	
		
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
