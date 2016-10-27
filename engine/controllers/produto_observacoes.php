<?php

	require_once "../config.php";
	
	//parte1
	
	$id_observacoes = $_POST['id_observacoes'];
	$observacoes = $_POST['observacoes'];
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Produto_observacoes();
	$Item->SetValues($id_observacoes, $observacoes); 
		
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