<?php

	date_default_timezone_set('America/Sao_Paulo');	

	require_once "bd/bd.php";
	require_once "classes/produto.php";
	require_once "classes/usuario.php";
	require_once "classes/cliente.php";
	require_once "classes/produto_detalhes.php";
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		$dataCerta = $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
		return $dataCerta;
	}
	
?>