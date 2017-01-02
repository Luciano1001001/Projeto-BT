<?php
require_once "../../vendor/autoload.php";
use GiordanoLima\BoletosPHP\Boletos;

$boleto = new Boletos(Boletos::BOLETOSPHP_BANCOOB);
//var_dump($boleto);
$boleto->setData([
	"valor_boleto" => "25,00",
	"data_vencimento" => "02/01/2017",
	"nosso_numero" => "23",//passar o índice do boleto
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
	"endereco1" => "",
	"endereco2" => "",
	"demonstrativo1" => "",
	"demonstrativo2" => "",
	"demonstrativo3" => "",
	"instrucoes1" => "COBRAR MORA/DIA R$ 3,30 APOS O VENCIMENTOPAULO (38) 9893-2164 /  (38) 8815-2940",
	"instrucoes2" => "REIMPRESSÃO DO BOLETO                  WWW.SICOO.COM.BR",
	"instrucoes3" => "",
	"instrucoes4" => "",
	"quantidade" => "",
	"valor_unitario" => "",
	"aceite" => "N",
	"especie" => "",
	"especie_doc" => "",
	"cidade_uf" => "Diamantina/MG",
	"cedente"=> "PAULO HENRIQUE CRUZ – ME",
	"contrato"=> "TI-009",
	"numero_parcela" => "03",
    "total_parcelas" => "03",
	"modalidade_cobranca" => "01"

]);
$boleto->setImageBasePath("imagens/");
echo $boleto->render();
var_dump($boleto);
$dadosboleto = $boleto->getDadosBoleto();
echo $dadosboleto['sacado']."<br />";

foreach ($dadosboleto as $i => $value) {
	echo($dadosboleto[$i]."<br />");
}

?>
