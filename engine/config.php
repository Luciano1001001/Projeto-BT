﻿<?php
	
	error_reporting(error_reporting() & ~E_NOTICE);
	
	date_default_timezone_set('America/Sao_Paulo');	

	require_once "bd/bd.php";
	require_once "classes/produto.php";
	require_once "classes/usuario.php";
	require_once "classes/cliente.php";
	require_once "classes/produto_pacotes.php";
	require_once "classes/produto_valores.php";
	require_once "classes/produto_controle.php";
	require_once "classes/produto_observacoes.php";
	require_once "classes/boleto.php";
	require_once "classes/contrato.php";
	require_once "classes/pagamento.php";
	require_once "classes/passageiro.php";
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}
	
?>