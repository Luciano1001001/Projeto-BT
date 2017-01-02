<?php
require_once "../../vendor/autoload.php";
use GiordanoLima\BoletosPHP\Boletos;

$boleto = new Boletos(Boletos::BOLETOSPHP_BANCOOB);
//var_dump($boleto);
$boleto->setData([
	
		
		
		
		
		"valor_boleto" => "25,00",
	"data_vencimento" => "02/01/2017",
	"nosso_numero" => "1600023",//passar o índice do boleto
	"agencia" => "3046",
	"conta" => "25368",
	"conta_dv" => "5",
	"convenio" => "179682",
	"carteira" => "1",
	"identificacao" => "Agência de Viagens BRASILTUR",
	"cpf_cnpj" => "18.575.104/0001-90",
	"numero_documento" => "TI-009",//por enquanto o mesmo do contrato
	"data_documento" => "01/04/2016",
	"data_processamento" => "01/04/2016",
	"sacado" => "Nome do Sacado",
	"endereco" => "Rua Silveiro Lessa, 11 Diamantina",
	"endereco1" => "Primeira linha endereço cliente",
	"endereco2" => "Segunda linha endereço cliente",
	"demonstrativo1" => "Demonstrativo 1 do canhoto - interno/não vai pro banco - informação ao cliente",
	"demonstrativo2" => "Demonstrativo 2 do canhoto",
	"demonstrativo3" => "Demonstrativo 3 do canhoto",
	"instrucoes1" => "COBRAR MORA/DIAR$ 3,30 APOS O VENCIMENTO",
	"instrucoes2" => "PAULO (38) 9893-2164 /  (38) 8815-2940  ",
	"instrucoes3" => "REIMPRESSÃO DO BOLETO                   ",
	"instrucoes4" => "WWW.SICOO.COM.BR @ infromações cliente",
	"quantidade" => "25,00",
	"valor_unitario" => "1,0",
	"valor_desconto_1" => "2,30",
	"valor_desconto_2" => "4,20",
	"valor_multa" => "3,14",
	"aceite" => "N",
	"especie" => "R$",
	"especie_doc" => "DM",
	"cidade_uf" => "Diamantina/MG",
	"cedente"=> "PAULO HENRIQUE CRUZ – ME",
	"contrato"=> "TI-009",
	"numero_parcela" => "03",
    "total_parcelas" => "03",
	"modalidade_cobranca" => "01"

]);
$boleto->setImageBasePath("imagens/");
echo $boleto->render();
//var_dump($boleto);
$dadosboleto = $boleto->getDadosBoleto();
//echo $dadosboleto['sacado']."<br />";

/* foreach ($dadosboleto as $i => $value) {
	echo($dadosboleto[$i]."<br />");
} */

?>
