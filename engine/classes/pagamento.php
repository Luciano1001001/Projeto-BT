<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Pagamento {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_pagamento;
		private $forma_pagamento;
		private $condicao_pagamento;
		private $dt_inicio_pagamento;
		private $quant_parcelas_pagamento;
		private $valor_bruto_pagamento;
		private $valor_taxas_pagamento;
		private $valor_liquido_pagamento;
		private $id_contrato;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_pagamento, $forma_pagamento, $condicao_pagamento, $dt_inicio_pagamento, $quant_parcelas_pagamento, $valor_bruto_pagamento, $valor_taxas_pagamento, $valor_liquido_pagamento, $id_contrato) { 
			$this->id_pagamento = $id_pagamento;
			$this->forma_pagamento = $forma_pagamento;
			$this->condicao_pagamento = $condicao_pagamento;
			$this->dt_inicio_pagamento = $dt_inicio_pagamento;
			$this->quant_parcelas_pagamento = $quant_parcelas_pagamento;
			$this->valor_bruto_pagamento = $valor_bruto_pagamento;
			$this->valor_taxas_pagamento = $valor_taxas_pagamento;
			$this->valor_liquido_pagamento = $valor_liquido_pagamento;
			$this->id_contrato = $id_contrato;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO pagamento 
						  (
				 			id_pagamento,
				 			forma_pagamento,
				 			condicao_pagamento,
				 			dt_inicio_pagamento,
				 			quant_parcelas_pagamento,
				 			valor_bruto_pagamento,
				 			valor_taxas_pagamento,
				 			valor_liquido_pagamento,
				 			id_contrato
						  )  
				VALUES 
					(
				 			'$this->id_pagamento',
				 			'$this->forma_pagamento',
				 			'$this->condicao_pagamento',
				 			'$this->dt_inicio_pagamento',
				 			'$this->quant_parcelas_pagamento',
				 			'$this->valor_bruto_pagamento',
				 			'$this->valor_taxas_pagamento',
				 			'$this->valor_liquido_pagamento',
				 			'$this->id_contrato'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_pagamento,
					 t1.forma_pagamento,
					 t1.condicao_pagamento,
					 t1.dt_inicio_pagamento,
					 t1.quant_parcelas_pagamento,
					 t1.valor_bruto_pagamento,
					 t1.valor_taxas_pagamento,
					 t1.valor_liquido_pagamento,
					 t1.id_contrato
				FROM
					pagamento AS t1
				WHERE
					t1.id_pagamento  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_pagamento,
					 t1.forma_pagamento,
					 t1.condicao_pagamento,
					 t1.dt_inicio_pagamento,
					 t1.quant_parcelas_pagamento,
					 t1.valor_bruto_pagamento,
					 t1.valor_taxas_pagamento,
					 t1.valor_liquido_pagamento,
					 t1.id_contrato
				FROM
					pagamento AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_pagamento,
					 t1.forma_pagamento,
					 t1.condicao_pagamento,
					 t1.dt_inicio_pagamento,
					 t1.quant_parcelas_pagamento,
					 t1.valor_bruto_pagamento,
					 t1.valor_taxas_pagamento,
					 t1.valor_liquido_pagamento,
					 t1.id_contrato
				FROM
					pagamento AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE pagamento SET
				
				  forma_pagamento = '$this->forma_pagamento',
				  condicao_pagamento = '$this->condicao_pagamento',
				  dt_inicio_pagamento = '$this->dt_inicio_pagamento',
				  quant_parcelas_pagamento = '$this->quant_parcelas_pagamento',
				  valor_bruto_pagamento = '$this->valor_bruto_pagamento',
				  valor_taxas_pagamento = '$this->valor_taxas_pagamento',
				  valor_liquido_pagamento = '$this->valor_liquido_pagamento',
				  id_contrato = '$this->id_contrato'
				
				WHERE id_pagamento = '$this->id_pagamento';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM pagamento
				WHERE id_pagamento = '$this->id_pagamento';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_pagamento;
			$this->forma_pagamento;
			$this->condicao_pagamento;
			$this->dt_inicio_pagamento;
			$this->quant_parcelas_pagamento;
			$this->valor_bruto_pagamento;
			$this->valor_taxas_pagamento;
			$this->valor_liquido_pagamento;
			$this->id_contrato;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_pagamento;
			$this->forma_pagamento;
			$this->condicao_pagamento;
			$this->dt_inicio_pagamento;
			$this->quant_parcelas_pagamento;
			$this->valor_bruto_pagamento;
			$this->valor_taxas_pagamento;
			$this->valor_liquido_pagamento;
			$this->id_contrato;
			
			
		}
			
	};

?>
