<?php
	class Produto_controle{
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_controle;
		private $fk_produto;
		private $controle;

		//setters
		//Funcao que seta uma instancia da classe
		public function SetValues($id_controle, $fk_produto, $controle){ 
			$this->id_controle = $id_controle;
			$this->fk_produto = $fk_produto;
			$this->controle = $controle;
		}
		
		//Methods
		//Funcao que salva a instancia no BD
		public function Create(){
			
			$sql = "
				INSERT INTO produto_controle
						  (
						  	id_controle,
				 			fk_produto,
							controle
						  )  
				VALUES 
					(
						'$this->id_controle',
						'$this->fk_produto',
						'$this->controle'
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
					 t1.id_controle,
					 t1.fk_produto,					 
					 t1.controle
				FROM
					produto_controle AS t1
				WHERE
					t1.id_controle = '$id'
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
					 t1.id_controle,
					 t1.fk_produto,					 
					 t1.controle
				FROM
					produto_controle AS t1
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
					 t1.id_controle,
					 t1.fk_produto,					 
					 t1.controle
				FROM
					produto_controle AS t1
					
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
				UPDATE produto_controle SET
				
				  controle = '$this->controle',
				  fk_produto = '$this->fk_produto'
				  
				WHERE id_controle = '$this->id_controle';
			";
		
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		public function UpdateTeste(){
			$sql = "
				UPDATE produto_controle SET
				
				  controle = '$this->controle'
				  
				WHERE fk_produto = '$this->fk_produto';
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
				DELETE FROM produto_controle
				WHERE id_controle = '$this->id_controle';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//constructor 
		function __construct(){ 
			$this->id_controle;
			$this->fk_produto;
			$this->controle;
		}
		
		//destructor
		function __destruct(){
			$this->id_controle;
			$this->fk_produto;
			$this->controle;
		}	
	};
?>