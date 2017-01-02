<?php
//API Url
$url = 'http://localhost:27017/remessa/gerar';
 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.
$jsonData = array(
    "codigo_banco" => 756,
    "razao_social" => "EMPRESA LTDA",
    "numero_inscricao" => 1234567890123,
    "agencia" => 1234,
    "agencia_dv" => 2,
    "conta" => 31234,
    "conta_dv" => 3,
    "codigo_beneficiario" => 123456,
    "codigo_beneficiario_dv" => 2,
    "detalhes" => array(
            "nosso_numero" => 1234,
            "carteira" => 123,
            "cod_carteira" => 123,
            "valor" => "100.00",
            "nome_pagador" => "JÃO DO TESTE",
            "tipo_pagador" => 1,
            "cpf_cnpj" => "9211932313",
            "endereco_pagador" => "Rua A",
            "bairro_pagador" => "Bairro B",
            "cep_pagador" => "30774942",
            "cidade_pagador" => "Belo Horizonte",
            "uf_pagador" => "MG",
            "data_vencimento" => "02/12/2016",
            "data_emissao" => "30/11/2016",
            "vlr_juros" => "1.15",
            "taxa_juros" => "1%",
            "data_desconto" => "",
            "vlr_desconto" => "",
            "prazo" => "",
            "mensagem" => "",
            "email_pagador" => "",
            "data_multa" => "",
            "valor_multa" => "",
            "taxa_multa" => "10%"
        ),
);
 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
echo $jsonData;
echo $jsonDataEncoded;
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
 
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
 
//Execute the request
$result = curl_exec($ch);
echo $result;
?>