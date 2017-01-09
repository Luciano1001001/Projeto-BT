<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Boleto {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_boleto;
		private $id_pagamento_boleto;
		private $nosso_numero_boleto;
		private $nosso_numero_cnab_boleto;
		private $dt_emissao_boleto;
		private $dt_vencimento_boleto;
		private $valor_boleto;
		private $especie_boleto;
		private $aceite_boleto;
		private $cod_protesto_boleto;
		private $prazo_protesto_boleto;
		private $num_parcela_boleto;
		private $cod_moeda_boleto;
		private $informacao_boleto_3;
		private $informacao_boleto_4;
		private $informacao_boleto_5;
		private $informacao_boleto_6;
		private $informacao_boleto_7;
		private $id_lote;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_boleto, $id_pagamento_boleto, $nosso_numero_boleto, $nosso_numero_cnab_boleto, $dt_emissao_boleto, $dt_vencimento_boleto, $valor_boleto, $especie_boleto, $aceite_boleto, $cod_protesto_boleto, $prazo_protesto_boleto, $num_parcela_boleto, $cod_moeda_boleto, $informacao_boleto_3, $informacao_boleto_4, $informacao_boleto_5, $informacao_boleto_6, $informacao_boleto_7, $id_lote) { 
			$this->id_boleto = $id_boleto;
			$this->id_pagamento_boleto = $id_pagamento_boleto;
			$this->nosso_numero_boleto = $nosso_numero_boleto;
			$this->nosso_numero_cnab_boleto = $nosso_numero_cnab_boleto;
			$this->dt_emissao_boleto = $dt_emissao_boleto;
			$this->dt_vencimento_boleto = $dt_vencimento_boleto;
			$this->valor_boleto = $valor_boleto;
			$this->especie_boleto = $especie_boleto;
			$this->aceite_boleto = $aceite_boleto;
			$this->cod_protesto_boleto = $cod_protesto_boleto;
			$this->prazo_protesto_boleto = $prazo_protesto_boleto;
			$this->num_parcela_boleto = $num_parcela_boleto;
			$this->cod_moeda_boleto = $cod_moeda_boleto;
			$this->informacao_boleto_3 = $informacao_boleto_3;
			$this->informacao_boleto_4 = $informacao_boleto_4;
			$this->informacao_boleto_5 = $informacao_boleto_5;
			$this->informacao_boleto_6 = $informacao_boleto_6;
			$this->informacao_boleto_7 = $informacao_boleto_7;
			$this->id_lote = $id_lote;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO boleto 
						  (
				 			id_boleto,
				 			id_pagamento_boleto,
				 			nosso_numero_boleto,
				 			nosso_numero_cnab_boleto,
				 			dt_emissao_boleto,
				 			dt_vencimento_boleto,
				 			valor_boleto,
				 			especie_boleto,
				 			aceite_boleto,
				 			cod_protesto_boleto,
				 			prazo_protesto_boleto,
				 			num_parcela_boleto,
				 			cod_moeda_boleto,
				 			informacao_boleto_3,
				 			informacao_boleto_4,
				 			informacao_boleto_5,
				 			informacao_boleto_6,
				 			informacao_boleto_7,
				 			id_lote
						  )  
				VALUES 
					(
				 			'$this->id_boleto',
				 			'$this->id_pagamento_boleto',
				 			'$this->nosso_numero_boleto',
				 			'$this->nosso_numero_cnab_boleto',
				 			'$this->dt_emissao_boleto',
				 			'$this->dt_vencimento_boleto',
				 			'$this->valor_boleto',
				 			'$this->especie_boleto',
				 			'$this->aceite_boleto',
				 			'$this->cod_protesto_boleto',
				 			'$this->prazo_protesto_boleto',
				 			'$this->num_parcela_boleto',
				 			'$this->cod_moeda_boleto',
				 			'$this->informacao_boleto_3',
				 			'$this->informacao_boleto_4',
				 			'$this->informacao_boleto_5',
				 			'$this->informacao_boleto_6',
				 			'$this->informacao_boleto_7',
				 			'$this->id_lote'
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
					 t1.nosso_numero_boleto,
					 t1.nosso_numero_cnab_boleto,
					 t1.dt_emissao_boleto,
					 t1.dt_vencimento_boleto,
					 t1.valor_boleto,
					 t1.especie_boleto,
					 t1.aceite_boleto,
					 t1.cod_protesto_boleto,
					 t1.prazo_protesto_boleto,
					 t1.num_parcela_boleto,
					 t1.cod_moeda_boleto,
					 t1.informacao_boleto_3,
					 t1.informacao_boleto_4,
					 t1.informacao_boleto_5,
					 t1.informacao_boleto_6,
					 t1.informacao_boleto_7,
					 t1.id_lote
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
					 t1.nosso_numero_boleto,
					 t1.nosso_numero_cnab_boleto,
					 t1.dt_emissao_boleto,
					 t1.dt_vencimento_boleto,
					 t1.valor_boleto,
					 t1.especie_boleto,
					 t1.aceite_boleto,
					 t1.cod_protesto_boleto,
					 t1.prazo_protesto_boleto,
					 t1.num_parcela_boleto,
					 t1.cod_moeda_boleto,
					 t1.informacao_boleto_3,
					 t1.informacao_boleto_4,
					 t1.informacao_boleto_5,
					 t1.informacao_boleto_6,
					 t1.informacao_boleto_7,
					 t1.id_lote
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
					 t1.nosso_numero_boleto,
					 t1.nosso_numero_cnab_boleto,
					 t1.dt_emissao_boleto,
					 t1.dt_vencimento_boleto,
					 t1.valor_boleto,
					 t1.especie_boleto,
					 t1.aceite_boleto,
					 t1.cod_protesto_boleto,
					 t1.prazo_protesto_boleto,
					 t1.num_parcela_boleto,
					 t1.cod_moeda_boleto,
					 t1.informacao_boleto_3,
					 t1.informacao_boleto_4,
					 t1.informacao_boleto_5,
					 t1.informacao_boleto_6,
					 t1.informacao_boleto_7,
					 t1.id_lote
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
				  nosso_numero_boleto = '$this->nosso_numero_boleto',
				  nosso_numero_cnab_boleto = '$this->nosso_numero_cnab_boleto',
				  dt_emissao_boleto = '$this->dt_emissao_boleto',
				  dt_vencimento_boleto = '$this->dt_vencimento_boleto',
				  valor_boleto = '$this->valor_boleto',
				  especie_boleto = '$this->especie_boleto',
				  aceite_boleto = '$this->aceite_boleto',
				  cod_protesto_boleto = '$this->cod_protesto_boleto',
				  prazo_protesto_boleto = '$this->prazo_protesto_boleto',
				  num_parcela_boleto = '$this->num_parcela_boleto',
				  cod_moeda_boleto = '$this->cod_moeda_boleto',
				  informacao_boleto_3 = '$this->informacao_boleto_3',
				  informacao_boleto_4 = '$this->informacao_boleto_4',
				  informacao_boleto_5 = '$this->informacao_boleto_5',
				  informacao_boleto_6 = '$this->informacao_boleto_6',
				  informacao_boleto_7 = '$this->informacao_boleto_7',
				  id_lote = '$this->id_lote'
				
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
			$this->nosso_numero_boleto;
			$this->nosso_numero_cnab_boleto;
			$this->dt_emissao_boleto;
			$this->dt_vencimento_boleto;
			$this->valor_boleto;
			$this->especie_boleto;
			$this->aceite_boleto;
			$this->cod_protesto_boleto;
			$this->prazo_protesto_boleto;
			$this->num_parcela_boleto;
			$this->cod_moeda_boleto;
			$this->informacao_boleto_3;
			$this->informacao_boleto_4;
			$this->informacao_boleto_5;
			$this->informacao_boleto_6;
			$this->informacao_boleto_7;
			$this->id_lote;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_boleto;
			$this->id_pagamento_boleto;
			$this->nosso_numero_boleto;
			$this->nosso_numero_cnab_boleto;
			$this->dt_emissao_boleto;
			$this->dt_vencimento_boleto;
			$this->valor_boleto;
			$this->especie_boleto;
			$this->aceite_boleto;
			$this->cod_protesto_boleto;
			$this->prazo_protesto_boleto;
			$this->num_parcela_boleto;
			$this->cod_moeda_boleto;
			$this->informacao_boleto_3;
			$this->informacao_boleto_4;
			$this->informacao_boleto_5;
			$this->informacao_boleto_6;
			$this->informacao_boleto_7;
			$this->id_lote;
			
			
		}
			
	};

?>
