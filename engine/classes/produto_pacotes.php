<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produto_pacotes{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_produto_pacotes;
		private $nome_pacote;
		private $descricao_pacote;		

		//setters
		//Funcao que seta uma instancia da classe
		public function SetValues($id_produto_pacotes, $nome_pacote, $descricao_pacote){ 
			$this->id_produto_pacotes = $id_produto_pacotes;
			$this->nome_pacote = $nome_pacote;
			$this->descricao_pacote = $descricao_pacote;				
		}
		
		//Methods
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO produto_pacotes
						  (
				 			id_produto_pacotes,
							nome_pacote,
							descricao_pacote
						  )  
				VALUES 
					(
						'$this->id_produto_pacotes',
						'$this->nome_pacote',
						'$this->descricao_pacote'
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
					 t5.id_produto_pacotes,					 
					 t5.nome_pacote,
					 t5.descricao_pacote
				FROM
					produto_pacotes AS t5
				WHERE
					t5.id_produto_pacotes = '$id'

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
					 t5.id_produto_pacotes,					 
					 t5.nome_pacote,
					 t5.descricao_pacote
				FROM
					produto_pacotes AS t5
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
					 t5.id_produto_pacotes,					 
					 t5.nome_pacote,
					 t5.descricao_pacote
				FROM
					produto_pacotes AS t5
					
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
				UPDATE produto_pacotes SET
				
				  nome_pacote = '$this->nome_pacote',
				  descricao_pacote = '$this->descricao_pacote'
				  
				WHERE id_produto_pacotes = '$this->id_produto_pacotes';
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
				DELETE FROM produto_pacotes
				WHERE id_produto_pacotes = '$this->id_produto_pacotes';
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
			$this->id_produto_pacotes;
			$this->nome_pacote;
			$this->descricao_pacote;
		}
		
		//destructor
		function __destruct(){
			$this->id_produto_pacotes;
			$this->nome_pacote;
			$this->descricao_pacote;
		}	
	};
?>