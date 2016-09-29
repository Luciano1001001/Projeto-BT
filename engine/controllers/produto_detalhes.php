<?php

	require_once "../config.php";
	
	//parte1
	$id_produto_detalhes= $_POST['id_produto_detalhes'];
	$fk_id_produto= $_POST['fk_id_produto'];
	$transporte_produto= $_POST['valor_produto_detalhes'];
	$hospedagem_produto= $_POST['tipo_produto_detalhes'];
	$alimentacao_produto= $_POST['grupo_produto_detalhes'];
	$observacoes_produto= $_POST['observacoes_produto_detalhes'];
	$estrutura_produto= $_POST['info_pagamento_detalhes'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto_detalhes();
	$Item->SetValues($id_produto_detalhes, $fk_id_produto, $valor_produto_detalhes, $tipo_produto_detalhes, $grupo_produto_detalhes, $observacoes_produto_detalhes, $info_pagamento_detalhes);
	
	//parte4
	switch($action){
		case 'create':
			
			
			$res = $Item->Create();
			if($res === NULL){
				$res = "true";
			}
			else{
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();
			
			if($res === NULL){
				$res= 'true';	
			}
			else{
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $Item->Delete();
			if($res === NULL){
				$res= 'true';	
			}
			else{
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>