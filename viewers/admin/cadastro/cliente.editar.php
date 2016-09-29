<script>
	$(document).ready(function(e) {
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    	});
		
		$('#bread_cliente').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    	});
		
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});	
		
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
		});

		$('#Salvar').click(function(e) {
			e.preventDefault();

			//1 instansciar e recuperar valores dos inputs
			var id = $('#id_cliente').val();
			var nome_cliente = $('#nome_cliente').val();
			var email_cliente = $('#email_cliente').val();
			var dtnascimento_cliente = $('#dtnascimento_cliente').val();
			var rg_cliente = $('#rg_cliente').val();
			var cpf_cliente = $('#cpf_cliente').val();
			var endereco_cliente = $('#endereco_cliente').val();
			var cidade_cliente = $('#cidade_cliente').val();
			var estado_cliente = $('#estado_cliente').val();
			var cep_cliente = $('#cep_cliente').val();
			var telfixo_cliente = $('#telfixo_cliente').val();
			var dtcadastro_cliente = $('#dtcadastro_cliente').val();
			var celular_cliente = $('#celular_cliente').val();

			//2 validar os inputs
			if(nome_cliente === "" || email_cliente === "" || cpf_cliente === "" || dtnascimento_cliente === "" || rg_cliente === "" || endereco_cliente === "" || cidade_cliente === "" || estado_cliente === "" || cep_cliente === "" || celular_cliente === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				var corrigeData = dtcadastro_cliente.split('/');
										//posicao do ano	posicao do mes		posicao do dia
				dtcadastro_cliente = corrigeData[2]+'-'+corrigeData[1]+'-'+corrigeData[0];
				
				corrigeData = dtnascimento_cliente.split('/');
										//posicao do ano	posicao do mes		posicao do dia
				dtnascimento_cliente = corrigeData[2]+'-'+corrigeData[1]+'-'+corrigeData[0];
				
				var emailtester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				emailtester = re.test(email_cliente);
				if(!emailtester){

					return alert("Formato de email incorreto. Corrija o campo e tente novamente");
				}
				else{
					$.ajax({
					   url: 'engine/controllers/cliente.php',
					   data: {
							 	id_cliente : id,
						 	 	nome_cliente : nome_cliente,
						 	 	email_cliente : email_cliente,
								dtnascimento_cliente : dtnascimento_cliente,
				 				rg_cliente : rg_cliente,
				 				cpf_cliente : cpf_cliente,
				 				endereco_cliente : endereco_cliente,
								cidade_cliente : cidade_cliente,
								estado_cliente : estado_cliente,
				 				cep_cliente : cep_cliente,
				 				telfixo_cliente : telfixo_cliente,
				 				dtcadastro_cliente : dtcadastro_cliente,
				 				celular_cliente : celular_cliente,
								action: 'update'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							console.log(data);
							if(data === 'true'){
								alert('Item editado com sucesso!');
								$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
							}

							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
							}
					   },

					   type: 'POST'
					});
				}
			}
		});

		$('#Excluir').click(function(e) {
			e.preventDefault();
			//loader

			var id = $('#id_cliente').val();
			//alert(id);
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
					 url: 'engine/controllers/cliente.php',
					 data: {
						id_cliente : id,
						action: 'delete'
					 },
					 error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					 },
					 success: function(data) {
						console.log(data);
						if(data === 'true'){
							alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
						}

						else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
					 },

					 type: 'POST'
				});
			}

		});


		//mascaras abaixo
		$('#telfixo_cliente').mask('(99) 9999-9999');
		$('#celular_cliente').mask('(99) 9-9999-9999');
		//$('#rg_cliente').mask('');
		$('#cpf_cliente').mask('999.999.999.99');
		$("#dtnascimento_cliente").mask("99/99/9999");
		$("#cep_cliente").mask("99999-999");

	});
</script>

<?php
	require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Cadastro</a></li>
  <li><a href="#" id="bread_cliente">Cliente</a></li>
  <li class="active">Editar Dados</li>
</ol>



<h1>
	Editar Cliente
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
  <button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Salvar</button>
	<button type="button" class="btn btn-danger" id="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir</button>
</section>



<br><br>

<?php
	$Item = new Cliente();
	$Item = $Item->Read($_POST['id']);
	//var_dump($Item);
?>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Nome *</span>
          <input type="text" class="form-control" id="nome_cliente" placeholder="Nome" aria-describedby="basic-addon1" value="<?php echo $Item['nome_cliente']; ?>">
        </div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Email *</span>
          	<input type="text" class="form-control" id="email_cliente" placeholder="Email" aria-describedby="basic-addon1" value="<?php echo $Item['email_cliente']; ?>">
        </div>
    </section>
    
	<section class="col-md-4">
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Data de Nascimento *</span>
			<input type="text" class="form-control" id="dtnascimento_cliente" placeholder="Data de Nascimento" aria-describedby="basic-addon1" value="<?php echo ExibeData($Item['dtnascimento_cliente']); ?>">       								
			</div>
		</section>
</section>

<br>
<section class="row formAdicionarDados">
	<section class="col-md-4">
	    	<div class="input-group">
	          <span class="input-group-addon" id="basic-addon1">RG *</span>
	          <input type="text" class="form-control" id="rg_cliente" placeholder="RG" aria-describedby="basic-addon1" value="<?php echo $Item['rg_cliente']; ?>">
	        </div>
    </section>

		<section class="col-md-4">
	    	<div class="input-group">
	          <span class="input-group-addon" id="basic-addon1">CPF *</span>
	          <input type="text" class="form-control" id="cpf_cliente" placeholder="CPF" aria-describedby="basic-addon1" value="<?php echo $Item['cpf_cliente']; ?>">
	        </div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Endereço *</span>
          <input type="text" class="form-control" id="endereco_cliente" placeholder="Endereço" aria-describedby="basic-addon1" value="<?php echo $Item['endereco_cliente']; ?>">
        </div>
    </section>
</section>

<br/>
<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Cidade *</span>
          <input type="text" class="form-control" id="cidade_cliente" placeholder="Cidade" aria-describedby="basic-addon1" value="<?php echo $Item['cidade_cliente']; ?>">
      </div>
    </section>
    
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Estado *</span>
          <select class="form-control" name="select_estado" id="estado_cliente">
				<option value="">Selecione...</option>
                <option value="AC" <?php if($Item['estado_cliente'] == "AC") echo 'selected' ?>>Acre</option>
                <option value="AL" <?php if($Item['estado_cliente'] === "AL") echo 'selected' ?>>Alagoas</option>
                <option value="AP" <?php if($Item['estado_cliente'] === "AP") echo 'selected' ?>>Amapá</option>
                <option value="AM" <?php if($Item['estado_cliente'] === "AM") echo 'selected' ?>>Amazonas</option>
                <option value="BA" <?php if($Item['estado_cliente'] === "BA") echo 'selected' ?>>Bahia</option>
                <option value="CE" <?php if($Item['estado_cliente'] === "CE") echo 'selected' ?>>Ceará</option>
                <option value="DF" <?php if($Item['estado_cliente'] === "DF") echo 'selected' ?>>Distrito Federal</option>
                <option value="ES" <?php if($Item['estado_cliente'] === "ES") echo 'selected' ?>>Espirito Santo</option>
                <option value="GO" <?php if($Item['estado_cliente'] === "GO") echo 'selected' ?>>Goiás</option>
                <option value="MA" <?php if($Item['estado_cliente'] === "MA") echo 'selected' ?>>Maranhão</option>
                <option value="MS" <?php if($Item['estado_cliente'] === "MS") echo 'selected' ?>>Mato Grosso do Sul</option>
                <option value="MT" <?php if($Item['estado_cliente'] === "MT") echo 'selected' ?>>Mato Grosso</option>
                <option value="MG" <?php if($Item['estado_cliente'] === "MG") echo 'selected' ?>>Minas Gerais</option>
                <option value="PA" <?php if($Item['estado_cliente'] === "PA") echo 'selected' ?>>Pará</option>
                <option value="PB" <?php if($Item['estado_cliente'] === "PB") echo 'selected' ?>>Paraíba</option>
                <option value="PR" <?php if($Item['estado_cliente'] === "PR") echo 'selected' ?>>Paraná</option>
                <option value="PE" <?php if($Item['estado_cliente'] === "PE") echo 'selected' ?>>Pernambuco</option>
                <option value="PI" <?php if($Item['estado_cliente'] === "PI") echo 'selected' ?>>Piauí</option>
                <option value="RJ" <?php if($Item['estado_cliente'] === "RJ") echo 'selected' ?>>Rio de Janeiro</option>
                <option value="RN" <?php if($Item['estado_cliente'] === "RN") echo 'selected' ?>>Rio Grande do Norte</option>
                <option value="RS" <?php if($Item['estado_cliente'] === "RS") echo 'selected' ?>>Rio Grande do Sul</option>
                <option value="RO" <?php if($Item['estado_cliente'] === "RO") echo 'selected' ?>>Rondônia</option>
                <option value="RR" <?php if($Item['estado_cliente'] === "RR") echo 'selected' ?>>Roraima</option>
                <option value="SC" <?php if($Item['estado_cliente'] === "SC") echo 'selected' ?>>Santa Catarina</option>
                <option value="SP" <?php if($Item['estado_cliente'] === "SP") echo 'selected' ?>>São Paulo</option>
                <option value="SE" <?php if($Item['estado_cliente'] === "SE") echo 'selected' ?>>Sergipe</option>
                <option value="TO" <?php if($Item['estado_cliente'] === "TO") echo 'selected' ?>>Tocantins</option>
          </select>
      </div>
    </section>

    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Cep *</span>
          <input type="text" class="form-control" id="cep_cliente" placeholder="Cep" aria-describedby="basic-addon1" value="<?php echo $Item['cep_cliente']; ?>">
      </div>
    </section>
</section>

<br>
<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Data de Cadastro *</span>
          <input type="text" class="form-control" id="dtcadastro_cliente" disabled placeholder="Data de Cadastro" aria-describedby="basic-addon1" value="<?php echo ExibeData($Item['dtcadastro_cliente']); ?>">
        </div>
    </section>

    <section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Telefone Fixo </span>
          <input type="text" class="form-control" id="telfixo_cliente" placeholder="Telefone Fixo" aria-describedby="basic-addon1" value="<?php echo $Item['telfixo_cliente']; ?>">
      </div>
    </section>

		<section class="col-md-4">
    	<div class="input-group">
          <span class="input-group-addon" id="basic-addon1">Celular *</span>
          <input type="text" class="form-control" id="celular_cliente" placeholder="Celular" aria-describedby="basic-addon1" value="<?php echo $Item['celular_cliente']; ?>">
      </div>
    </section>
</section>
<input type="hidden" id="id_cliente" value="<?php echo $Item['id_cliente']; ?>">
