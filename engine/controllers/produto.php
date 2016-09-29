<?php
	require_once "../config.php";
	
	//parte1
	$id_produto= $_POST['id_produto'];
	$nome_produto= $_POST['nome_produto'];
	$info_produto= $_POST['info_produto'];
	$periodo_produto= $_POST['periodo_produto'];
	$transporte_produto= $_POST['transporte_produto'];
	$hospedagem_produto= $_POST['hospedagem_produto'];
	$alimentacao_produto= $_POST['alimentacao_produto'];
	$observacoes_produto= $_POST['observacoes_produto'];
	$estrutura_produto= $_POST['estrutura_produto'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto();
	$Item->SetValues($id_produto, $nome_produto, $info_produto, $periodo_produto, $transporte_produto, $hospedagem_produto, $alimentacao_produto, $observacoes_produto, $estrutura_produto);
	
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