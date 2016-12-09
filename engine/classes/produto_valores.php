<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produto_valores{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_produto_valores;
		private $valor_produto;
		private $tipo_produto;
		private $grupo_produto;
		private $info_pagamento;
		private $fk_produto;

		//setters
		//Funcao que seta uma instancia da classe
		public function SetValues($id_produto_valores, $valor_produto, $tipo_produto, $grupo_produto, $info_pagamento, $fk_produto){ 
			$this->id_produto_valores = $id_produto_valores;
			$this->valor_produto = $valor_produto;
			$this->tipo_produto = $tipo_produto;
			$this->grupo_produto = $grupo_produto;
			$this->info_pagamento = $info_pagamento;
			$this->fk_produto = $fk_produto;
		}
		
		//Methods
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO produto_valores
						  (
				 			id_produto_valores,
							valor_produto,
							tipo_produto,
							grupo_produto,
							info_pagamento,
							fk_produto
						  )  
				VALUES 
					(
						'$this->id_produto_valores',
						'$this->valor_produto',
						'$this->tipo_produto',
						'$this->grupo_produto',
						'$this->info_pagamento',
						'$this->fk_produto'
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
					 t1.id_produto_valores,					 
					 t1.valor_produto,
					 t1.tipo_produto,
					 t1.grupo_produto,
					 t1.info_pagamento,
					 t1.fk_produto
				FROM
					produto_valores AS t1
				WHERE
					t1.id_produto_valores = '$id'

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
					 t1.id_produto_valores,					 
					 t1.valor_produto,
					 t1.tipo_produto,
					 t1.grupo_produto,
					 t1.info_pagamento,
					 t1.fk_produto
				FROM
					produto_valores AS t1
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}else{	
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
					 t1.id_produto_valores,					 
					 t1.valor_produto,
					 t1.tipo_produto,
					 t1.grupo_produto,
					 t1.info_pagamento,
					 t1.fk_produto
				FROM
					produto_valores AS t1
					
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
				UPDATE produto_valores SET
				
				  valor_produto = '$this->valor_produto',
				  tipo_produto = '$this->tipo_produto',
				  grupo_produto = '$this->grupo_produto',
				  info_pagamento = '$this->info_pagamento',
				  fk_produto = '$this->fk_produto'
				  
				WHERE id_produto_valores = '$this->id_produto_valores';
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
				DELETE FROM produto_valores
				WHERE id_produto_valores = '$this->id_produto_valores';
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
			$this->id_produto_valores;
			$this->valor_produto;
			$this->tipo_produto;
			$this->grupo_produto;
			$this->info_pagamento;
			$this->fk_produto;
		}
		
		//destructor
		function __destruct(){
			$this->id_produto_valores;
			$this->valor_produto;
			$this->tipo_produto;
			$this->grupo_produto;
			$this->info_pagamento;
			$this->fk_produto;
		}	
	};
?>