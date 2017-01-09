<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Lote {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_lote;
		private $controle_lote;
		private $informacao_1_lote;
		private $informacao_2_lote;
		private $num_remessa_lote;
		private $quant_registros_lote;
		private $quant_cob_simples_lote;
		private $valor_cob_simples_lote;
		private $quant_cob_vinculada_lote;
		private $valor_cob_vinculada_lote;
		private $quant_cob_caucionada_lote;
		private $valor_cob_caucionada_lote;
		private $quant_cob_descontada_lote;
		private $valor_cob_descontada_lote;
		private $id_arquivo;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_lote, $controle_lote, $informacao_1_lote, $informacao_2_lote, $num_remessa_lote, $quant_registros_lote, $quant_cob_simples_lote, $valor_cob_simples_lote, $quant_cob_vinculada_lote, $valor_cob_vinculada_lote, $quant_cob_caucionada_lote, $valor_cob_caucionada_lote, $quant_cob_descontada_lote, $valor_cob_descontada_lote, $id_arquivo) { 
			$this->id_lote = $id_lote;
			$this->controle_lote = $controle_lote;
			$this->informacao_1_lote = $informacao_1_lote;
			$this->informacao_2_lote = $informacao_2_lote;
			$this->num_remessa_lote = $num_remessa_lote;
			$this->quant_registros_lote = $quant_registros_lote;
			$this->quant_cob_simples_lote = $quant_cob_simples_lote;
			$this->valor_cob_simples_lote = $valor_cob_simples_lote;
			$this->quant_cob_vinculada_lote = $quant_cob_vinculada_lote;
			$this->valor_cob_vinculada_lote = $valor_cob_vinculada_lote;
			$this->quant_cob_caucionada_lote = $quant_cob_caucionada_lote;
			$this->valor_cob_caucionada_lote = $valor_cob_caucionada_lote;
			$this->quant_cob_descontada_lote = $quant_cob_descontada_lote;
			$this->valor_cob_descontada_lote = $valor_cob_descontada_lote;
			$this->id_arquivo = $id_arquivo;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO lote 
						  (
				 			id_lote,
				 			controle_lote,
				 			informacao_1_lote,
				 			informacao_2_lote,
				 			num_remessa_lote,
				 			quant_registros_lote,
				 			quant_cob_simples_lote,
				 			valor_cob_simples_lote,
				 			quant_cob_vinculada_lote,
				 			valor_cob_vinculada_lote,
				 			quant_cob_caucionada_lote,
				 			valor_cob_caucionada_lote,
				 			quant_cob_descontada_lote,
				 			valor_cob_descontada_lote,
				 			id_arquivo
						  )  
				VALUES 
					(
				 			'$this->id_lote',
				 			'$this->controle_lote',
				 			'$this->informacao_1_lote',
				 			'$this->informacao_2_lote',
				 			'$this->num_remessa_lote',
				 			'$this->quant_registros_lote',
				 			'$this->quant_cob_simples_lote',
				 			'$this->valor_cob_simples_lote',
				 			'$this->quant_cob_vinculada_lote',
				 			'$this->valor_cob_vinculada_lote',
				 			'$this->quant_cob_caucionada_lote',
				 			'$this->valor_cob_caucionada_lote',
				 			'$this->quant_cob_descontada_lote',
				 			'$this->valor_cob_descontada_lote',
				 			'$this->id_arquivo'
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
					 t1.id_lote,
					 t1.controle_lote,
					 t1.informacao_1_lote,
					 t1.informacao_2_lote,
					 t1.num_remessa_lote,
					 t1.quant_registros_lote,
					 t1.quant_cob_simples_lote,
					 t1.valor_cob_simples_lote,
					 t1.quant_cob_vinculada_lote,
					 t1.valor_cob_vinculada_lote,
					 t1.quant_cob_caucionada_lote,
					 t1.valor_cob_caucionada_lote,
					 t1.quant_cob_descontada_lote,
					 t1.valor_cob_descontada_lote,
					 t1.id_arquivo
				FROM
					lote AS t1
				WHERE
					t1.id_lote  = '$id'

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
					 t1.id_lote,
					 t1.controle_lote,
					 t1.informacao_1_lote,
					 t1.informacao_2_lote,
					 t1.num_remessa_lote,
					 t1.quant_registros_lote,
					 t1.quant_cob_simples_lote,
					 t1.valor_cob_simples_lote,
					 t1.quant_cob_vinculada_lote,
					 t1.valor_cob_vinculada_lote,
					 t1.quant_cob_caucionada_lote,
					 t1.valor_cob_caucionada_lote,
					 t1.quant_cob_descontada_lote,
					 t1.valor_cob_descontada_lote,
					 t1.id_arquivo
				FROM
					lote AS t1
				

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
					 t1.id_lote,
					 t1.controle_lote,
					 t1.informacao_1_lote,
					 t1.informacao_2_lote,
					 t1.num_remessa_lote,
					 t1.quant_registros_lote,
					 t1.quant_cob_simples_lote,
					 t1.valor_cob_simples_lote,
					 t1.quant_cob_vinculada_lote,
					 t1.valor_cob_vinculada_lote,
					 t1.quant_cob_caucionada_lote,
					 t1.valor_cob_caucionada_lote,
					 t1.quant_cob_descontada_lote,
					 t1.valor_cob_descontada_lote,
					 t1.id_arquivo
				FROM
					lote AS t1
					
					
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
				UPDATE lote SET
				
				  controle_lote = '$this->controle_lote',
				  informacao_1_lote = '$this->informacao_1_lote',
				  informacao_2_lote = '$this->informacao_2_lote',
				  num_remessa_lote = '$this->num_remessa_lote',
				  quant_registros_lote = '$this->quant_registros_lote',
				  quant_cob_simples_lote = '$this->quant_cob_simples_lote',
				  valor_cob_simples_lote = '$this->valor_cob_simples_lote',
				  quant_cob_vinculada_lote = '$this->quant_cob_vinculada_lote',
				  valor_cob_vinculada_lote = '$this->valor_cob_vinculada_lote',
				  quant_cob_caucionada_lote = '$this->quant_cob_caucionada_lote',
				  valor_cob_caucionada_lote = '$this->valor_cob_caucionada_lote',
				  quant_cob_descontada_lote = '$this->quant_cob_descontada_lote',
				  valor_cob_descontada_lote = '$this->valor_cob_descontada_lote',
				  id_arquivo = '$this->id_arquivo'
				
				WHERE id_lote = '$this->id_lote';
				
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
				DELETE FROM lote
				WHERE id_lote = '$this->id_lote';
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
			$this->id_lote;
			$this->controle_lote;
			$this->informacao_1_lote;
			$this->informacao_2_lote;
			$this->num_remessa_lote;
			$this->quant_registros_lote;
			$this->quant_cob_simples_lote;
			$this->valor_cob_simples_lote;
			$this->quant_cob_vinculada_lote;
			$this->valor_cob_vinculada_lote;
			$this->quant_cob_caucionada_lote;
			$this->valor_cob_caucionada_lote;
			$this->quant_cob_descontada_lote;
			$this->valor_cob_descontada_lote;
			$this->id_arquivo;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_lote;
			$this->controle_lote;
			$this->informacao_1_lote;
			$this->informacao_2_lote;
			$this->num_remessa_lote;
			$this->quant_registros_lote;
			$this->quant_cob_simples_lote;
			$this->valor_cob_simples_lote;
			$this->quant_cob_vinculada_lote;
			$this->valor_cob_vinculada_lote;
			$this->quant_cob_caucionada_lote;
			$this->valor_cob_caucionada_lote;
			$this->quant_cob_descontada_lote;
			$this->valor_cob_descontada_lote;
			$this->id_arquivo;
			
			
		}
			
	};

?>
