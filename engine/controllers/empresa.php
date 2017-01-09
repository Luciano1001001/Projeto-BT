<?php

	require_once "../config.php";
	

	//parte1
	
	$id_empresa = $_POST['id_empresa'];
	$cnpj_empresa = $_POST['cnpj_empresa'];
	$convenio_empresa = $_POST['convenio_empresa'];
	$carteira_empresa = $_POST['carteira_empresa'];
	$num_agencia_empresa = $_POST['num_agencia_empresa'];
	$dv_agencia_empresa = $_POST['dv_agencia_empresa'];
	$num_conta_empresa = $_POST['num_conta_empresa'];
	$dv_conta_empresa = $_POST['dv_conta_empresa'];
	$dv_ag_conta_empresa = $_POST['dv_ag_conta_empresa'];
	$razao_social_empresa = $_POST['razao_social_empresa'];
	$nome_fantasia_empresa = $_POST['nome_fantasia_empresa'];
	$nome_banco_empresa = $_POST['nome_banco_empresa'];
	$cod_banco_empresa = $_POST['cod_banco_empresa'];
	$end_empresa = $_POST['end_empresa'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Empresa();
	$Item->SetValues($id_empresa, $cnpj_empresa, $convenio_empresa, $carteira_empresa, $num_agencia_empresa, $dv_agencia_empresa, $num_conta_empresa, $dv_conta_empresa, $dv_ag_conta_empresa, $razao_social_empresa, $nome_fantasia_empresa, $nome_banco_empresa, $cod_banco_empresa, $end_empresa); 
	
	
		
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
