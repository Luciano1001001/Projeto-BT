<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produto_detalhes{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_produto_detalhes;
		private $fk_id_produto;
		private $valor_produto_detalhes;
		private $tipo_produto_detalhes;
		private $grupo_produto_detalhes;
		private $observacoes_produto_detalhes;
		private $info_pagamento_detalhes;

		//setters
		//Funcao que seta uma instancia da classe
		public function SetValues($id_produto_detalhes, $fk_id_produto, $valor_produto_detalhes, $tipo_produto_detalhes, $grupo_produto_detalhes, $observacoes_produto_detalhes, $info_pagamento_detalhes){ 
			$this->id_produto_detalhes = $id_produto_detalhes;
			$this->fk_id_produto = $fk_id_produto;
			$this->transporte_produto = $valor_produto_detalhes;
			$this->hospedagem_produto = $tipo_produto_detalhes;
			$this->alimentacao_produto = $grupo_produto_detalhes;
			$this->observacoes_produto = $observacoes_produto_detalhes;
			$this->estrutura_produto = $info_pagamento_detalhes;				
		}
		
		//Methods
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO produto_detalhes
						  (
				 			id_produto_detalhes,
							fk_id_produto,
							valor_produto_detalhes,
							tipo_produto_detalhes,
							grupo_produto_detalhes,
							observacoes_produto_detalhes,
							info_pagamento_detalhes
						  )  
				VALUES 
					(
						'$this->id_produto_detalhes',
						'$this->fk_id_produto',
						'$this->valor_produto_detalhes',
						'$this->tipo_produto_detalhes',
						'$this->grupo_produto_detalhes',
						'$this->observacoes_produto_detalhes',
						'$this->info_pagamento_detalhes'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id){
			$sql = "
				SELECT
					 t4.id_produto_detalhes,					 
					 t4.fk_id_produto,
					 t4.valor_produto_detalhes,
					 t4.tipo_produto_detalhes,
					 t4.grupo_produto_detalhes,
					 t4.observacoes_produto_detalhes,
					 t4.info_pagamento_detalhes
				FROM
					produto_detalhes AS t4
				WHERE
					t4.id_produto_detalhes = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll(){
			$sql = "
				SELECT
					 t4.id_produto_detalhes,					 
					 t4.fk_id_produto,
					 t4.valor_produto_detalhes,
					 t4.tipo_produto_detalhes,
					 t4.grupo_produto_detalhes,
					 t4.observacoes_produto_detalhes,
					 t4.info_pagamento_detalhes
				FROM
					produto_detalhes AS t4
				

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
		public function ReadAll_Paginacao($inicio, $registros){
			$sql = "
				SELECT
					 t4.id_produto_detalhes,					 
					 t4.fk_id_produto,
					 t4.valor_produto_detalhes,
					 t4.tipo_produto_detalhes,
					 t4.grupo_produto_detalhes,
					 t4.observacoes_produto_detalhes,
					 t4.info_pagamento_detalhes
				FROM
					produto_detalhes AS t4
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update(){
			$sql = "
				UPDATE produto_detalhes SET
				
				  fk_id_produto = '$this->fk_id_produto',
				  valor_produto_detalhes = '$this->valor_produto_detalhes',
				  tipo_produto_detalhes = '$this->tipo_produto_detalhes',
				  grupo_produto_detalhes = '$this->grupo_produto_detalhes',
				  observacoes_produto_detalhes = '$this->observacoes_produto_detalhes',
				  info_pagamento_detalhes = '$this->info_pagamento_detalhes'
				  
				WHERE id_produto_detalhes = '$this->id_produto_detalhes';
			";
		
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete(){
			$sql = "
				DELETE FROM produto_detalhes
				WHERE id_produto_detalhes = '$this->id_produto_detalhes';
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
		
		function __construct(){ 
			$this->id_produto_detalhes;
			$this->fk_id_produto;
			$this->valor_produto_detalhes;
			$this->tipo_produto_detalhes;
			$this->grupo_produto_detalhes;
			$this->observacoes_produto_detalhes;
			$this->info_pagamento_detalhes;
		}
		
		//destructor
		function __destruct(){
			$this->id_produto_detalhes;
			$this->fk_id_produto;
			$this->valor_produto_detalhes;
			$this->tipo_produto_detalhes;
			$this->grupo_produto_detalhes;
			$this->observacoes_produto_detalhes;
			$this->info_pagamento_detalhes;
		}	
	};
?>