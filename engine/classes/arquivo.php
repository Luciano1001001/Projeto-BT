<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Arquivo {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_arquivo;
		private $id_empresa;
		private $cod_arquivo;
		private $dt_geracao_arquivo;
		private $quant_lotes_arquivo;
		private $quant_registros_arquivo;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_arquivo, $id_empresa, $cod_arquivo, $dt_geracao_arquivo, $quant_lotes_arquivo, $quant_registros_arquivo) { 
			$this->id_arquivo = $id_arquivo;
			$this->id_empresa = $id_empresa;
			$this->cod_arquivo = $cod_arquivo;
			$this->dt_geracao_arquivo = $dt_geracao_arquivo;
			$this->quant_lotes_arquivo = $quant_lotes_arquivo;
			$this->quant_registros_arquivo = $quant_registros_arquivo;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO arquivo 
						  (
				 			id_arquivo,
				 			id_empresa,
				 			cod_arquivo,
				 			dt_geracao_arquivo,
				 			quant_lotes_arquivo,
				 			quant_registros_arquivo
						  )  
				VALUES 
					(
				 			'$this->id_arquivo',
				 			'$this->id_empresa',
				 			'$this->cod_arquivo',
				 			'$this->dt_geracao_arquivo',
				 			'$this->quant_lotes_arquivo',
				 			'$this->quant_registros_arquivo'
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
					 t1.id_arquivo,
					 t1.id_empresa,
					 t1.cod_arquivo,
					 t1.dt_geracao_arquivo,
					 t1.quant_lotes_arquivo,
					 t1.quant_registros_arquivo
				FROM
					arquivo AS t1
				WHERE
					t1.id_arquivo  = '$id'

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
					 t1.id_arquivo,
					 t1.id_empresa,
					 t1.cod_arquivo,
					 t1.dt_geracao_arquivo,
					 t1.quant_lotes_arquivo,
					 t1.quant_registros_arquivo
				FROM
					arquivo AS t1
				

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
					 t1.id_arquivo,
					 t1.id_empresa,
					 t1.cod_arquivo,
					 t1.dt_geracao_arquivo,
					 t1.quant_lotes_arquivo,
					 t1.quant_registros_arquivo
				FROM
					arquivo AS t1
					
					
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
				UPDATE arquivo SET
				
				  id_empresa = '$this->id_empresa',
				  cod_arquivo = '$this->cod_arquivo',
				  dt_geracao_arquivo = '$this->dt_geracao_arquivo',
				  quant_lotes_arquivo = '$this->quant_lotes_arquivo',
				  quant_registros_arquivo = '$this->quant_registros_arquivo'
				
				WHERE id_arquivo = '$this->id_arquivo';
				
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
				DELETE FROM arquivo
				WHERE id_arquivo = '$this->id_arquivo';
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
			$this->id_arquivo;
			$this->id_empresa;
			$this->cod_arquivo;
			$this->dt_geracao_arquivo;
			$this->quant_lotes_arquivo;
			$this->quant_registros_arquivo;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_arquivo;
			$this->id_empresa;
			$this->cod_arquivo;
			$this->dt_geracao_arquivo;
			$this->quant_lotes_arquivo;
			$this->quant_registros_arquivo;
			
			
		}
			
	};

?>
