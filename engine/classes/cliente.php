<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Cliente {

		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_cliente;
		private $nome_cliente;
		private $cpf_cliente;
		private $rg_cliente;
		private $dtnascimento_cliente;
		private $endereco_cliente;
		private $cidade_cliente;
		private $estado_cliente;
		private $cep_cliente;
		private $email_cliente;
		private $telfixo_cliente;
		private $celular_cliente;
		private $dtcadastro_cliente;


		//setters

		//Funcao que seta uma instancia da classe
		public function SetValues($id_cliente, $nome_cliente, $cpf_cliente, $rg_cliente, $dtnascimento_cliente, $endereco_cliente, $cidade_cliente, $estado_cliente, $cep_cliente, $email_cliente, $telfixo_cliente, $celular_cliente, $dtcadastro_cliente) {
			$this->id_cliente = $id_cliente;
			$this->nome_cliente = $nome_cliente;
			$this->cpf_cliente = $cpf_cliente;
			$this->rg_cliente = $rg_cliente;
			$this->dtnascimento_cliente = $dtnascimento_cliente;
			$this->endereco_cliente = $endereco_cliente;
			$this->cidade_cliente = $cidade_cliente;
			$this->estado_cliente = $estado_cliente;
			$this->cep_cliente = $cep_cliente;
			$this->email_cliente = $email_cliente;
			$this->telfixo_cliente = $telfixo_cliente;
			$this->celular_cliente = $celular_cliente;
			$this->dtcadastro_cliente = $dtcadastro_cliente;

		}


		//Methods

		//Funcao que salva a instancia no BD
		public function Create() {

			$sql = "
				INSERT INTO cliente
						  (

				 			nome_cliente,
				 			cpf_cliente,
				 			rg_cliente,
				 			dtnascimento_cliente,
				 			endereco_cliente,
							cidade_cliente,
							estado_cliente,
				 			cep_cliente,
				 			email_cliente,
				 			telfixo_cliente,
				 			celular_cliente,
				 			dtcadastro_cliente
						  )
				VALUES
					(
				 			
				 			'$this->nome_cliente',
				 			'$this->cpf_cliente',
				 			'$this->rg_cliente',
				 			'$this->dtnascimento_cliente',
				 			'$this->endereco_cliente',
							'$this->cidade_cliente',
							'$this->estado_cliente',
				 			'$this->cep_cliente',
				 			'$this->email_cliente',
				 			'$this->telfixo_cliente',
				 			'$this->celular_cliente',
				 			'$this->dtcadastro_cliente'
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
					 t1.id_cliente,
					 t1.nome_cliente,
					 t1.cpf_cliente,
					 t1.rg_cliente,
					 t1.dtnascimento_cliente,
					 t1.endereco_cliente,
					 t1.cidade_cliente,
					 t1.estado_cliente,
					 t1.cep_cliente,
					 t1.email_cliente,
					 t1.telfixo_cliente,
					 t1.celular_cliente,
					 t1.dtcadastro_cliente
				FROM
					cliente AS t1
				WHERE
					t1.id_cliente  = '$id'

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
					 t1.id_cliente,
					 t1.nome_cliente,
					 t1.cpf_cliente,
					 t1.rg_cliente,
					 t1.dtnascimento_cliente,
					 t1.endereco_cliente,
					 t1.cidade_cliente,
					 t1.estado_cliente,
					 t1.cep_cliente,
					 t1.email_cliente,
					 t1.telfixo_cliente,
					 t1.celular_cliente,
					 t1.dtcadastro_cliente
				FROM
					cliente AS t1


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
					 t1.id_cliente,
					 t1.nome_cliente,
					 t1.cpf_cliente,
					 t1.rg_cliente,
					 t1.dtnascimento_cliente,
					 t1.endereco_cliente,
					 t1.cidade_cliente,
					 t1.estado_cliente,
					 t1.cep_cliente,
					 t1.email_cliente,
					 t1.telfixo_cliente,
					 t1.celular_cliente,
					 t1.dtcadastro_cliente
				FROM
					cliente AS t1


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
				UPDATE cliente SET

				  nome_cliente = '$this->nome_cliente',
				  cpf_cliente = '$this->cpf_cliente',
				  rg_cliente = '$this->rg_cliente',
				  dtnascimento_cliente = '$this->dtnascimento_cliente',
				  endereco_cliente = '$this->endereco_cliente',
				  cidade_cliente = '$this->cidade_cliente',
				  estado_cliente = '$this->estado_cliente',
				  cep_cliente = '$this->cep_cliente',
				  email_cliente = '$this->email_cliente',
				  telfixo_cliente = '$this->telfixo_cliente',
				  celular_cliente = '$this->celular_cliente',
				  dtcadastro_cliente = '$this->dtcadastro_cliente'

				WHERE id_cliente = '$this->id_cliente';

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
				DELETE FROM cliente
				WHERE id_cliente = '$this->id_cliente';
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
			$this->id_cliente;
			$this->nome_cliente;
			$this->cpf_cliente;
			$this->rg_cliente;
			$this->dtnascimento_cliente;
			$this->endereco_cliente;
			$this->cidade_cliente;
			$this->estado_cliente;
			$this->cep_cliente;
			$this->email_cliente;
			$this->telfixo_cliente;
			$this->celular_cliente;
			$this->dtcadastro_cliente;
		}

		//destructor
		function __destruct() {
			$this->id_cliente;
			$this->nome_cliente;
			$this->cpf_cliente;
			$this->rg_cliente;
			$this->dtnascimento_cliente;
			$this->endereco_cliente;
			$this->cidade_cliente;
			$this->estado_cliente;
			$this->cep_cliente;
			$this->email_cliente;
			$this->telfixo_cliente;
			$this->celular_cliente;
			$this->dtcadastro_cliente;
		}
	};
?>