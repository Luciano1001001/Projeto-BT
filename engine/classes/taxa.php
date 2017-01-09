<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Taxa {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_taxa;
		private $id_pagamento;
		private $natureza_taxa;
		private $cod_taxa;
		private $dt_aplica_taxa;
		private $multiplicador_taxa;
		private $valor_taxa;
		private $descricao_taxa;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_taxa, $id_pagamento, $natureza_taxa, $cod_taxa, $dt_aplica_taxa, $multiplicador_taxa, $valor_taxa, $descricao_taxa) { 
			$this->id_taxa = $id_taxa;
			$this->id_pagamento = $id_pagamento;
			$this->natureza_taxa = $natureza_taxa;
			$this->cod_taxa = $cod_taxa;
			$this->dt_aplica_taxa = $dt_aplica_taxa;
			$this->multiplicador_taxa = $multiplicador_taxa;
			$this->valor_taxa = $valor_taxa;
			$this->descricao_taxa = $descricao_taxa;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO taxa 
						  (
				 			id_taxa,
				 			id_pagamento,
				 			natureza_taxa,
				 			cod_taxa,
				 			dt_aplica_taxa,
				 			multiplicador_taxa,
				 			valor_taxa,
				 			descricao_taxa
						  )  
				VALUES 
					(
				 			'$this->id_taxa',
				 			'$this->id_pagamento',
				 			'$this->natureza_taxa',
				 			'$this->cod_taxa',
				 			'$this->dt_aplica_taxa',
				 			'$this->multiplicador_taxa',
				 			'$this->valor_taxa',
				 			'$this->descricao_taxa'
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
					 t1.id_taxa,
					 t1.id_pagamento,
					 t1.natureza_taxa,
					 t1.cod_taxa,
					 t1.dt_aplica_taxa,
					 t1.multiplicador_taxa,
					 t1.valor_taxa,
					 t1.descricao_taxa
				FROM
					taxa AS t1
				WHERE
					t1.id_taxa  = '$id'

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
					 t1.id_taxa,
					 t1.id_pagamento,
					 t1.natureza_taxa,
					 t1.cod_taxa,
					 t1.dt_aplica_taxa,
					 t1.multiplicador_taxa,
					 t1.valor_taxa,
					 t1.descricao_taxa
				FROM
					taxa AS t1
				

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
					 t1.id_taxa,
					 t1.id_pagamento,
					 t1.natureza_taxa,
					 t1.cod_taxa,
					 t1.dt_aplica_taxa,
					 t1.multiplicador_taxa,
					 t1.valor_taxa,
					 t1.descricao_taxa
				FROM
					taxa AS t1
					
					
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
				UPDATE taxa SET
				
				  id_pagamento = '$this->id_pagamento',
				  natureza_taxa = '$this->natureza_taxa',
				  cod_taxa = '$this->cod_taxa',
				  dt_aplica_taxa = '$this->dt_aplica_taxa',
				  multiplicador_taxa = '$this->multiplicador_taxa',
				  valor_taxa = '$this->valor_taxa',
				  descricao_taxa = '$this->descricao_taxa'
				
				WHERE id_taxa = '$this->id_taxa';
				
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
				DELETE FROM taxa
				WHERE id_taxa = '$this->id_taxa';
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
			$this->id_taxa;
			$this->id_pagamento;
			$this->natureza_taxa;
			$this->cod_taxa;
			$this->dt_aplica_taxa;
			$this->multiplicador_taxa;
			$this->valor_taxa;
			$this->descricao_taxa;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_taxa;
			$this->id_pagamento;
			$this->natureza_taxa;
			$this->cod_taxa;
			$this->dt_aplica_taxa;
			$this->multiplicador_taxa;
			$this->valor_taxa;
			$this->descricao_taxa;
			
			
		}
			
	};

?>
