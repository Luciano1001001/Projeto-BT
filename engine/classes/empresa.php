<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Empresa {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_empresa;
		private $cnpj_empresa;
		private $convenio_empresa;
		private $carteira_empresa;
		private $num_agencia_empresa;
		private $dv_agencia_empresa;
		private $num_conta_empresa;
		private $dv_conta_empresa;
		private $dv_ag_conta_empresa;
		private $razao_social_empresa;
		private $nome_fantasia_empresa;
		private $nome_banco_empresa;
		private $cod_banco_empresa;
		private $end_empresa;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_empresa, $cnpj_empresa, $convenio_empresa, $carteira_empresa, $num_agencia_empresa, $dv_agencia_empresa, $num_conta_empresa, $dv_conta_empresa, $dv_ag_conta_empresa, $razao_social_empresa, $nome_fantasia_empresa, $nome_banco_empresa, $cod_banco_empresa, $end_empresa) { 
			$this->id_empresa = $id_empresa;
			$this->cnpj_empresa = $cnpj_empresa;
			$this->convenio_empresa = $convenio_empresa;
			$this->carteira_empresa = $carteira_empresa;
			$this->num_agencia_empresa = $num_agencia_empresa;
			$this->dv_agencia_empresa = $dv_agencia_empresa;
			$this->num_conta_empresa = $num_conta_empresa;
			$this->dv_conta_empresa = $dv_conta_empresa;
			$this->dv_ag_conta_empresa = $dv_ag_conta_empresa;
			$this->razao_social_empresa = $razao_social_empresa;
			$this->nome_fantasia_empresa = $nome_fantasia_empresa;
			$this->nome_banco_empresa = $nome_banco_empresa;
			$this->cod_banco_empresa = $cod_banco_empresa;
			$this->end_empresa = $end_empresa;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO empresa 
						  (
				 			id_empresa,
				 			cnpj_empresa,
				 			convenio_empresa,
				 			carteira_empresa,
				 			num_agencia_empresa,
				 			dv_agencia_empresa,
				 			num_conta_empresa,
				 			dv_conta_empresa,
				 			dv_ag_conta_empresa,
				 			razao_social_empresa,
				 			nome_fantasia_empresa,
				 			nome_banco_empresa,
				 			cod_banco_empresa,
				 			end_empresa
						  )  
				VALUES 
					(
				 			'$this->id_empresa',
				 			'$this->cnpj_empresa',
				 			'$this->convenio_empresa',
				 			'$this->carteira_empresa',
				 			'$this->num_agencia_empresa',
				 			'$this->dv_agencia_empresa',
				 			'$this->num_conta_empresa',
				 			'$this->dv_conta_empresa',
				 			'$this->dv_ag_conta_empresa',
				 			'$this->razao_social_empresa',
				 			'$this->nome_fantasia_empresa',
				 			'$this->nome_banco_empresa',
				 			'$this->cod_banco_empresa',
				 			'$this->end_empresa'
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
					 t1.id_empresa,
					 t1.cnpj_empresa,
					 t1.convenio_empresa,
					 t1.carteira_empresa,
					 t1.num_agencia_empresa,
					 t1.dv_agencia_empresa,
					 t1.num_conta_empresa,
					 t1.dv_conta_empresa,
					 t1.dv_ag_conta_empresa,
					 t1.razao_social_empresa,
					 t1.nome_fantasia_empresa,
					 t1.nome_banco_empresa,
					 t1.cod_banco_empresa,
					 t1.end_empresa
				FROM
					empresa AS t1
				WHERE
					t1.id_empresa  = '$id'

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
					 t1.id_empresa,
					 t1.cnpj_empresa,
					 t1.convenio_empresa,
					 t1.carteira_empresa,
					 t1.num_agencia_empresa,
					 t1.dv_agencia_empresa,
					 t1.num_conta_empresa,
					 t1.dv_conta_empresa,
					 t1.dv_ag_conta_empresa,
					 t1.razao_social_empresa,
					 t1.nome_fantasia_empresa,
					 t1.nome_banco_empresa,
					 t1.cod_banco_empresa,
					 t1.end_empresa
				FROM
					empresa AS t1
				

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
					 t1.id_empresa,
					 t1.cnpj_empresa,
					 t1.convenio_empresa,
					 t1.carteira_empresa,
					 t1.num_agencia_empresa,
					 t1.dv_agencia_empresa,
					 t1.num_conta_empresa,
					 t1.dv_conta_empresa,
					 t1.dv_ag_conta_empresa,
					 t1.razao_social_empresa,
					 t1.nome_fantasia_empresa,
					 t1.nome_banco_empresa,
					 t1.cod_banco_empresa,
					 t1.end_empresa
				FROM
					empresa AS t1
					
					
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
				UPDATE empresa SET
				
				  cnpj_empresa = '$this->cnpj_empresa',
				  convenio_empresa = '$this->convenio_empresa',
				  carteira_empresa = '$this->carteira_empresa',
				  num_agencia_empresa = '$this->num_agencia_empresa',
				  dv_agencia_empresa = '$this->dv_agencia_empresa',
				  num_conta_empresa = '$this->num_conta_empresa',
				  dv_conta_empresa = '$this->dv_conta_empresa',
				  dv_ag_conta_empresa = '$this->dv_ag_conta_empresa',
				  razao_social_empresa = '$this->razao_social_empresa',
				  nome_fantasia_empresa = '$this->nome_fantasia_empresa',
				  nome_banco_empresa = '$this->nome_banco_empresa',
				  cod_banco_empresa = '$this->cod_banco_empresa',
				  end_empresa = '$this->end_empresa'
				
				WHERE id_empresa = '$this->id_empresa';
				
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
				DELETE FROM empresa
				WHERE id_empresa = '$this->id_empresa';
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
			$this->id_empresa;
			$this->cnpj_empresa;
			$this->convenio_empresa;
			$this->carteira_empresa;
			$this->num_agencia_empresa;
			$this->dv_agencia_empresa;
			$this->num_conta_empresa;
			$this->dv_conta_empresa;
			$this->dv_ag_conta_empresa;
			$this->razao_social_empresa;
			$this->nome_fantasia_empresa;
			$this->nome_banco_empresa;
			$this->cod_banco_empresa;
			$this->end_empresa;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_empresa;
			$this->cnpj_empresa;
			$this->convenio_empresa;
			$this->carteira_empresa;
			$this->num_agencia_empresa;
			$this->dv_agencia_empresa;
			$this->num_conta_empresa;
			$this->dv_conta_empresa;
			$this->dv_ag_conta_empresa;
			$this->razao_social_empresa;
			$this->nome_fantasia_empresa;
			$this->nome_banco_empresa;
			$this->cod_banco_empresa;
			$this->end_empresa;
			
			
		}
			
	};

?>
