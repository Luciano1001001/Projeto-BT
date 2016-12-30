<?php
require_once "../../vendor/autoload.php";
use GiordanoLima\BoletosPHP\Boletos;

$boleto = new Boletos(Boletos::BOLETOSPHP_BANCOOB);
//var_dump($boleto);
$boleto->setData([
    "valor_boleto" => "99,00",
    "data_vencimento" => "01/04/2016",
    "nosso_numero" => "000001",
    "valor_boleto" => "25,00",
	"data_vencimento" => "01/02/2017",
	"nosso_numero" => 3,
	"agencia" => "3406",
	"conta" => "25368",
	"conta_dv" => "5",
	"carteira" => "1",
	"identificacao" => "Agência de Viagens BRASILTUR",
	"cpf_cnpj" => "18.575.104/0001-90",
	"numero_documento" => "12",
	"data_documento" => "01/04/2016",
	"data_processamento" => "01/04/2016",
	"sacado" => "Nome do Sacado",
	"endereco" => "Rua Silveiro Lessa, 11 Diamantina",
	"endereco1" => "",
	"endereco2" => "",
	"demonstrativo1" => "",
	"demonstrativo2" => "",
	"demonstrativo3" => "",
	"instrucoes1" => "",
	"instrucoes2" => "",
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
	"numero_parcela'" => 3,
    "total_parcelas" => 5
	
]);
$boleto->setImageBasePath("imagens/");
echo $boleto->render();
var_dump($boleto);
$dadosboleto = $boleto->getDadosBoleto();
echo $dadosboleto['sacado'];

foreach ($dadosboleto as $i => $value) {
	echo($dadosboleto[$i]);
}

?>
