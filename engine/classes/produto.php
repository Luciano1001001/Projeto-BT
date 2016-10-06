<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produto{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_produto;
		private $nome_produto;
		private $info_produto;
		private $periodo_produto;
		private $transporte_produto;
		private $hospedagem_produto;
		private $alimentacao_produto;
		private $estrutura_produto;

		//setters
		//Funcao que seta uma instancia da classe
		public function SetValues($id_produto, $nome_produto, $info_produto, $periodo_produto, $transporte_produto, $hospedagem_produto, $alimentacao_produto, $estrutura_produto){ 
			$this->id_produto = $id_produto;
			$this->nome_produto = $nome_produto;
			$this->info_produto = $info_produto;
			$this->periodo_produto = $periodo_produto;
			$this->transporte_produto = $transporte_produto;
			$this->hospedagem_produto = $hospedagem_produto;
			$this->alimentacao_produto = $alimentacao_produto;
			$this->estrutura_produto = $estrutura_produto;
		}
		
		//Methods
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO produto
						  (
				 			id_produto,
							nome_produto,
							info_produto,
							periodo_produto,
							transporte_produto,
							hospedagem_produto,
							alimentacao_produto,
							estrutura_produto
						  )  
				VALUES 
					(
						'$this->id_produto',
						'$this->nome_produto',
						'$this->info_produto',
						'$this->periodo_produto',
						'$this->transporte_produto',
						'$this->hospedagem_produto',
						'$this->alimentacao_produto',
						'$this->estrutura_produto'
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
					 t1.id_produto,					 
					 t1.nome_produto,
					 t1.info_produto,
					 t1.periodo_produto,
					 t1.transporte_produto,
					 t1.hospedagem_produto,
					 t1.alimentacao_produto,
					 t1.estrutura_produto
				FROM
					produto AS t1
				WHERE
					t1.id_produto = '$id'
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
					 t1.id_produto,					 
					 t1.nome_produto,
					 t1.info_produto,
					 t1.periodo_produto,
					 t1.transporte_produto,
					 t1.hospedagem_produto,
					 t1.alimentacao_produto,
					 t1.estrutura_produto
				FROM
					produto AS t1
				

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
					 t1.id_produto,					 
					 t1.nome_produto,
					 t1.info_produto,
					 t1.periodo_produto,
					 t1.transporte_produto,
					 t1.hospedagem_produto,
					 t1.alimentacao_produto,
					 t1.estrutura_produto
				FROM
					produto AS t1
					
					
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
				UPDATE produto SET
				
				  nome_produto = '$this->nome_produto',
				  info_produto = '$this->info_produto',
				  periodo_produto = '$this->periodo_produto',
				  transporte_produto = '$this->transporte_produto',
				  hospedagem_produto = '$this->hospedagem_produto',
				  alimentacao_produto = '$this->alimentacao_produto',
				  estrutura_produto = '$this->estrutura_produto'	  
				  
				WHERE id_produto = '$this->id_produto';
				
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
				DELETE FROM produto
				WHERE id_produto = '$this->id_produto';
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
			$this->id_produto;
			$this->nome_produto;
			$this->info_produto;
			$this->periodo_produto;
			$this->transporte_produto;
			$this->hospedagem_produto;
			$this->alimentacao_produto;
			$this->estrutura_produto;
		}
		
		//destructor
		function __destruct(){
			$this->id_produto;
			$this->nome_produto;
			$this->info_produto;
			$this->periodo_produto;
			$this->transporte_produto;
			$this->hospedagem_produto;
			$this->alimentacao_produto;
			$this->estrutura_produto;
		}	
	};
?>