<?php

	require_once "../config.php";
	
	//parte1
	$id_produto_pacotes= $_POST['id_produto_pacotes'];
	$nome_pacote= $_POST['nome_pacote'];
	$valor_pacote= $_POST['valor_pacote'];
	$descricao_pacote= $_POST['descricao_pacote'];
	$fk_produto= $_POST['fk_produto'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto_pacotes();
	$Item->SetValues($id_produto_pacotes, $nome_pacote, $valor_pacote, $descricao_pacote, $fk_produto);
	
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