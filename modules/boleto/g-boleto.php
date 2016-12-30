<?php
require_once "../../vendor/autoload.php";
use GiordanoLima\BoletosPHP\Boletos;

$boleto = new Boletos(Boletos::BOLETOSPHP_ITAU);
//var_dump($boleto);
$boleto->setData([
    "valor_boleto" => "99,00",
    "data_vencimento" => "01/04/2016",
    "nosso_numero" => "001",
    "valor_boleto" => "25,00",
	"data_vencimento" => "01/02/2017",
	"nosso_numero" => 3,
	"agencia" => "3406",
	"conta" => "25368",
	"conta_dv" => "5",
	"carteira" => "1",
	"identificacao" => "PAULO HENRIQUE CRUZ – ME",
	"cpf_cnpj" => "18575104000190",
	"numero_documento" => "12",
	"data_documento" => "01/04/2016",
	"data_processamento" => "01/04/2016",
	"sacado" => "",
	"endereco" => "",
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
	"aceite" => "",
	"especie" => "",
	"especie_doc" => "",
	"cidade_uf" => "",
	"cedente"=> ""
	
]);
$boleto->setImageBasePath("imagens/");
echo $boleto->render();
//var_dump($boleto);

?>
