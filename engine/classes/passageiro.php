<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Passageiro {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_passageiro;
		private $id_cliente;
		private $id_contrato;
		private $menor_passageiro;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_passageiro, $id_cliente, $id_contrato, $menor_passageiro) { 
			$this->id_passageiro = $id_passageiro;
			$this->id_cliente = $id_cliente;
			$this->id_contrato = $id_contrato;
			$this->menor_passageiro = $menor_passageiro;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO passageiro 
						  (
				 			id_passageiro,
				 			id_cliente,
				 			id_contrato,
				 			menor_passageiro
						  )  
				VALUES 
					(
				 			'$this->id_passageiro',
				 			'$this->id_cliente',
				 			'$this->id_contrato',
				 			'$this->menor_passageiro'
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
					 t1.id_passageiro,
					 t1.id_cliente,
					 t1.id_contrato,
					 t1.menor_passageiro
				FROM
					passageiro AS t1
				WHERE
					t1.id_passageiro  = '$id'

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
					 t1.id_passageiro,
					 t1.id_cliente,
					 t1.id_contrato,
					 t1.menor_passageiro
				FROM
					passageiro AS t1
				

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
					 t1.id_passageiro,
					 t1.id_cliente,
					 t1.id_contrato,
					 t1.menor_passageiro
				FROM
					passageiro AS t1
					
					
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
				UPDATE passageiro SET
				
				  id_cliente = '$this->id_cliente',
				  id_contrato = '$this->id_contrato',
				  menor_passageiro = '$this->menor_passageiro'
				
				WHERE id_passageiro = '$this->id_passageiro';
				
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
				DELETE FROM passageiro
				WHERE id_passageiro = '$this->id_passageiro';
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
			$this->id_passageiro;
			$this->id_cliente;
			$this->id_contrato;
			$this->menor_passageiro;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_passageiro;
			$this->id_cliente;
			$this->id_contrato;
			$this->menor_passageiro;
			
			
		}
			
	};

?>
