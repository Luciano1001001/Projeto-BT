<?php
	require_once "../config.php";
	
	//parte1
	$id_produto_valores= $_POST['id_produto_valores'];
	$valor_produto= $_POST['valor_produto'];
	$tipo_produto= $_POST['tipo_produto'];
	$grupo_produto= $_POST['grupo_produto'];
	$observacoes_produto= $_POST['observacoes_produto'];
	$info_pagamento= $_POST['info_pagamento'];
	$fk_produto= $_POST['fk_produto'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto_valores();
	$Item->SetValues($id_produto_valores, $valor_produto, $tipo_produto, $grupo_produto, $observacoes_produto, $info_pagamento, $fk_produto);
	
	//parte4
	switch($action){
		case 'create':
			$res = $Item->Create();
			if($res === NULL){
				$res = "true";
			}else{
				$res = "false";	
			}			

			echo $res;
		
		break;	
		
		case 'update':
			$res = $Item->Update();
			
			if($res === NULL){
				$res= 'true';	
			}else{
				$res = 'false';	
			}
			echo $res;
			
		break;	
		case 'delete':
		
			$res = $Item->Delete();
			if($res === NULL){
				$res= 'true';	
			}else{
				$res = 'false';	
			}
			echo $res;
			
		break;	
	}
?>