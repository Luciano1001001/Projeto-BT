<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Contrato {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_contrato;
		private $id_contratante;
		private $dt_contrato;
		private $valor_contrato;
		private $pacote_contrato;
		private $numero_contrato;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_contrato, $id_contratante, $dt_contrato, $valor_contrato, $pacote_contrato, $numero_contrato) { 
			$this->id_contrato = $id_contrato;
			$this->id_contratante = $id_contratante;
			$this->dt_contrato = $dt_contrato;
			$this->valor_contrato = $valor_contrato;
			$this->pacote_contrato = $pacote_contrato;
			$this->numero_contrato = $numero_contrato;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO contrato 
						  (
				 			id_contrato,
				 			id_contratante,
				 			dt_contrato,
				 			valor_contrato,
				 			pacote_contrato,
				 			numero_contrato
						  )  
				VALUES 
					(
				 			'$this->id_contrato',
				 			'$this->id_contratante',
				 			'$this->dt_contrato',
				 			'$this->valor_contrato',
				 			'$this->pacote_contrato',
				 			'$this->numero_contrato'
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
					 t1.id_contrato,
					 t1.id_contratante,
					 t1.dt_contrato,
					 t1.valor_contrato,
					 t1.pacote_contrato,
					 t1.numero_contrato
				FROM
					contrato AS t1
				WHERE
					t1.id_contrato  = '$id'

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
					 t1.id_contrato,
					 t1.id_contratante,
					 t1.dt_contrato,
					 t1.valor_contrato,
					 t1.pacote_contrato,
					 t1.numero_contrato
				FROM
					contrato AS t1
				

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
					 t1.id_contrato,
					 t1.id_contratante,
					 t1.dt_contrato,
					 t1.valor_contrato,
					 t1.pacote_contrato,
					 t1.numero_contrato
				FROM
					contrato AS t1
					
					
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
				UPDATE contrato SET
				
				  id_contratante = '$this->id_contratante',
				  dt_contrato = '$this->dt_contrato',
				  valor_contrato = '$this->valor_contrato',
				  pacote_contrato = '$this->pacote_contrato',
				  numero_contrato = '$this->numero_contrato'
				
				WHERE id_contrato = '$this->id_contrato';
				
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
				DELETE FROM contrato
				WHERE id_contrato = '$this->id_contrato';
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
			$this->id_contrato;
			$this->id_contratante;
			$this->dt_contrato;
			$this->valor_contrato;
			$this->pacote_contrato;
			$this->numero_contrato;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_contrato;
			$this->id_contratante;
			$this->dt_contrato;
			$this->valor_contrato;
			$this->pacote_contrato;
			$this->numero_contrato;
			
			
		}
			
	};

?>
