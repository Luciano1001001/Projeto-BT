<?php
require_once "../../engine/config.php";
// +----------------------------------------------------------------------+
// | BoletoPhp - Versão Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licença GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Você deve ter recebido uma cópia da GNU Public License junto com     |
// | esse pacote; se não, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colaborações de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do    |
// | PHPBoleto de João Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordenação Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto BANCOOB/SICOOB: Marcelo de Souza              |
// | Ajuste de algumas rotinas: Anderson Nuernberg                        |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Parte 1 - Receber os dados por POST e instanciar em variaveis locais |
// | Recebemos apenas os dados referentes ao Boleto e instanciamos o      |
// | restante das informações a partir de consultas MYSQL                 |
// +----------------------------------------------------------------------+

$id_boleto = $_POST['id_boleto'];
$id_pagamento_boleto = $_POST['id_pagamento_boleto'];
$id_cliente_pagador_boleto = $_POST['id_cliente_pagador_boleto'];
$id_cliente_avalista_boleto = $_POST['id_cliente_avalista_boleto'];
$dt_processamento_boleto = $_POST['dt_processamento_boleto'];
$dias_pagamento_boleto = $_POST['dias_pagamento_boleto'];
$especie_doc_boleto = $_POST['especie_doc_boleto'];
$nosso_numero_boleto = $_POST['nosso_numero_boleto'];
$valor_liquido_boleto = $_POST['valor_liquido_boleto'];

// +----------------------------------------------------------------------+
// | Parte 2 - Escolhendo opção: acho que aqui podemos diferenciar entre  |
// | boleto único em formato A4 e Carnê com prestações                    |
// +----------------------------------------------------------------------+

		
// +----------------------------------------------------------------------+
// | Instanciar dados do contrato                                         |
// +----------------------------------------------------------------------+

$Pagamento = new Pagamento();
$Pagamento = $Pagamento->Read('id_pagamento_boleto');

$Contrato = new Contrato();
		


// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE

$dias_de_prazo_para_pagamento = 30; //$dias_pagamento_boleto
$taxa_boleto = 0; //Taxa fixa?
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = "25,00"; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

//$dadosboleto["nosso_numero"] = "08123456";  // Até 8 digitos, sendo os 2 primeiros o ano atual (Ex.: 08 se for 2008)


/*************************************************************************
 * +++
 *************************************************************************/

// http://www.bancoob.com.br/atendimentocobranca/CAS/2_Implanta%C3%A7%C3%A3o_do_Servi%C3%A7o/Sistema_Proprio/DigitoVerificador.htm
// http://blog.inhosting.com.br/calculo-do-nosso-numero-no-boleto-bancoob-sicoob-do-boletophp/
// http://www.samuca.eti.br
// 
// http://www.bancoob.com.br/atendimentocobranca/CAS/2_Implanta%C3%A7%C3%A3o_do_Servi%C3%A7o/Sistema_Proprio/LinhaDigitavelCodicodeBarras.htm

// Contribuição de script por:
// 
// Samuel de L. Hantschel
// Site: www.samuca.eti.br
// 

if(!function_exists('formata_numdoc'))
{
	function formata_numdoc($num,$tamanho)
	{
		while(strlen($num)<$tamanho)
		{
			$num="0".$num; 
		}
	return $num;
	}
}

$IdDoSeuSistemaAutoIncremento = '2'; //$id_boleto Deve informar um numero sequencial a ser passada a função abaixo, Até 6 dígitos
$agencia = "3406"; // Num da agencia, sem digito
$conta = "25368"; // Num da conta, sem digito
$convenio = "17968"; //Número do convênio indicado no frontend

$NossoNumero = formata_numdoc($IdDoSeuSistemaAutoIncremento,7);
$qtde_nosso_numero = strlen($NossoNumero);
$sequencia = formata_numdoc($agencia,4).formata_numdoc(str_replace("-","",$convenio),10).formata_numdoc($NossoNumero,7);
$cont=0;
$calculoDv = '';
	for($num=0;$num<=strlen($sequencia);$num++)
	{
		$cont++;
		if($cont == 1)
		{
			// constante fixa Sicoob » 3197 
			$constante = 3;
		}
		if($cont == 2)
		{
			$constante = 1;
		}
		if($cont == 3)
		{
			$constante = 9;
		}
		if($cont == 4)
		{
			$constante = 7;
			$cont = 0;
		}
		$calculoDv = $calculoDv + (substr($sequencia,$num,1) * $constante);
	}
$Resto = $calculoDv % 11;
$Dv = 11 - $Resto;
if ($Dv == 0) $Dv = 0;
if ($Dv == 1) $Dv = 0;
if ($Dv > 9) $Dv = 0;
$dadosboleto["nosso_numero"] = $NossoNumero . $Dv;

/*************************************************************************
 * +++
 *************************************************************************/



$dadosboleto["numero_documento"] = "IT-2020";	// Inserir numero do contrato Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "Fulano de Tal Cliente BrasulTur";
$dadosboleto["endereco1"] = "Rua da Glória, 1024";
$dadosboleto["endereco2"] = "Diamantina - MG -  CEP: 39100-000";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Contrato de Viagem";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a nonon nonooon nononon<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.boletophp.com.br";

// INSTRUÇÕES PARA O CAIXA
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: xxxx@xxxx.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Projeto BoletoPhp - www.boletophp.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
//$dadosboleto["quantidade"] = "";
//$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "N";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DM";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
// DADOS ESPECIFICOS DO SICOOB
$dadosboleto["modalidade_cobranca"] = "01";
$dadosboleto["numero_parcela"] = "03";


// DADOS DA SUA CONTA - BANCO SICOOB
$dadosboleto["agencia"] = $agencia; // Num da agencia, sem digito
$dadosboleto["conta"] = $conta; // Num da conta, sem digito

// DADOS PERSONALIZADOS - SICOOB
$dadosboleto["convenio"] = $convenio; // Num do convênio - REGRA: No máximo 7 dígitos
$dadosboleto["carteira"] = "1";

// SEUS DADOS
$dadosboleto["identificacao"] = "Agência de Viagens BRASILTUR";
$dadosboleto["cpf_cnpj"] = "18.575.104/0001-90";
$dadosboleto["endereco"] = "Rua Silveiro Lessa, 11";
$dadosboleto["cidade_uf"] = "Diamantina/MG";
$dadosboleto["cedente"] = "Paulo Henrique Cruz – ME";

// NÃO ALTERAR!
include("include/funcoes_bancoob.php");
include("include/layout_bancoob.php");

?>
