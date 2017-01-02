<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Boleto {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_boleto;
		private $id_pagamento_boleto;
		private $id_cliente_pagador_boleto;
		private $id_cliente_avalista_boleto;
		private $dt_processamento_boleto;
		private $dias_pagamento_boleto;
		private $especie_doc_boleto;
		private $nosso_numero_boleto;
		private $valor_liquido_boleto;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_boleto, $id_pagamento_boleto, $id_cliente_pagador_boleto, $id_cliente_avalista_boleto, $dt_processamento_boleto, $dias_pagamento_boleto, $especie_doc_boleto, $nosso_numero_boleto, $valor_liquido_boleto) { 
			$this->id_boleto = $id_boleto;
			$this->id_pagamento_boleto = $id_pagamento_boleto;
			$this->id_cliente_pagador_boleto = $id_cliente_pagador_boleto;
			$this->id_cliente_avalista_boleto = $id_cliente_avalista_boleto;
			$this->dt_processamento_boleto = $dt_processamento_boleto;
			$this->dias_pagamento_boleto = $dias_pagamento_boleto;
			$this->especie_doc_boleto = $especie_doc_boleto;
			$this->nosso_numero_boleto = $nosso_numero_boleto;
			$this->valor_liquido_boleto = $valor_liquido_boleto;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO boleto 
						  (
				 			id_boleto,
				 			id_pagamento_boleto,
				 			id_cliente_pagador_boleto,
				 			id_cliente_avalista_boleto,
				 			dt_processamento_boleto,
				 			dias_pagamento_boleto,
				 			especie_doc_boleto,
				 			nosso_numero_boleto,
				 			valor_liquido_boleto
						  )  
				VALUES 
					(
				 			'$this->id_boleto',
				 			'$this->id_pagamento_boleto',
				 			'$this->id_cliente_pagador_boleto',
				 			'$this->id_cliente_avalista_boleto',
				 			'$this->dt_processamento_boleto',
				 			'$this->dias_pagamento_boleto',
				 			'$this->especie_doc_boleto',
				 			'$this->nosso_numero_boleto',
				 			'$this->valor_liquido_boleto'
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
					 t1.id_boleto,
					 t1.id_pagamento_boleto,
					 t1.id_cliente_pagador_boleto,
					 t1.id_cliente_avalista_boleto,
					 t1.dt_processamento_boleto,
					 t1.dias_pagamento_boleto,
					 t1.especie_doc_boleto,
					 t1.nosso_numero_boleto,
					 t1.valor_liquido_boleto
				FROM
					boleto AS t1
				WHERE
					t1.id_boleto  = '$id'

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
					 t1.id_boleto,
					 t1.id_pagamento_boleto,
					 t1.id_cliente_pagador_boleto,
					 t1.id_cliente_avalista_boleto,
					 t1.dt_processamento_boleto,
					 t1.dias_pagamento_boleto,
					 t1.especie_doc_boleto,
					 t1.nosso_numero_boleto,
					 t1.valor_liquido_boleto
				FROM
					boleto AS t1
				

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
					 t1.id_boleto,
					 t1.id_pagamento_boleto,
					 t1.id_cliente_pagador_boleto,
					 t1.id_cliente_avalista_boleto,
					 t1.dt_processamento_boleto,
					 t1.dias_pagamento_boleto,
					 t1.especie_doc_boleto,
					 t1.nosso_numero_boleto,
					 t1.valor_liquido_boleto
				FROM
					boleto AS t1
					
					
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
				UPDATE boleto SET
				
				  id_pagamento_boleto = '$this->id_pagamento_boleto',
				  id_cliente_pagador_boleto = '$this->id_cliente_pagador_boleto',
				  id_cliente_avalista_boleto = '$this->id_cliente_avalista_boleto',
				  dt_processamento_boleto = '$this->dt_processamento_boleto',
				  dias_pagamento_boleto = '$this->dias_pagamento_boleto',
				  especie_doc_boleto = '$this->especie_doc_boleto',
				  nosso_numero_boleto = '$this->nosso_numero_boleto',
				  valor_liquido_boleto = '$this->valor_liquido_boleto'
				
				WHERE id_boleto = '$this->id_boleto';
				
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
				DELETE FROM boleto
				WHERE id_boleto = '$this->id_boleto';
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
			$this->id_boleto;
			$this->id_pagamento_boleto;
			$this->id_cliente_pagador_boleto;
			$this->id_cliente_avalista_boleto;
			$this->dt_processamento_boleto;
			$this->dias_pagamento_boleto;
			$this->especie_doc_boleto;
			$this->nosso_numero_boleto;
			$this->valor_liquido_boleto;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_boleto;
			$this->id_pagamento_boleto;
			$this->id_cliente_pagador_boleto;
			$this->id_cliente_avalista_boleto;
			$this->dt_processamento_boleto;
			$this->dias_pagamento_boleto;
			$this->especie_doc_boleto;
			$this->nosso_numero_boleto;
			$this->valor_liquido_boleto;
			
			
		}
			
	};

?>
