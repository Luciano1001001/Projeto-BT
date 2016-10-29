<?php
	require_once "../config.php";
	
	//parte1
	$id_controle= $_POST['id_controle'];
	$fk_produto= $_POST['fk_produto'];
	$controle= $_POST['controle'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto_controle();
	$Item->SetValues($id_controle, $fk_produto, $controle);
	
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
				$res = 'true';	
			}else{
				$res = 'false';	
			}
			echo $res;
		
		break;	
		
		case 'updateTeste':	
			$res = $Item->UpdateTeste();
			
			if($res === NULL){
				$res = 'true';	
			}else{
				$res = 'false';	
			}
			echo $res;
		
		break;
		
		case 'delete':	
			$res = $Item->Delete();
			if($res === NULL){
				$res = 'true';	
			}else{
				$res = 'false';	
			}
			echo $res;
			
		break;		
	}
?>