<script>
	$(document).ready(function(e) {
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});
		
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
    	});
		
		$('#bread_produto').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
    	});
		
		$('#Voltar').click(function(e) {
    	    e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
		});
		
		$('#Proximo').click(function(e) {
    	    e.preventDefault();
			//1 instanciar e recuperar valores dos imputs
			var nome_produto = $('#nome_produto').val();
			var info_produto = $('#info_produto').val();
			var periodo_produto = $('#periodo_produto').val();
			
			//Novos dados
			var transporte_produto = $('#transporte_produto').val();
			var hospedagem_produto = $('#hospedagem_produto').val();
			var alimentacao_produto = $('#alimentacao_produto').val();
			var estrutura_produto = $('#estrutura_produto').val();
			//Fim dos novos dados
			
			//validar os imputs
			if(nome_produto === "" || info_produto === "" || periodo_produto === "" || transporte_produto === "" || hospedagem_produto === "" || alimentacao_produto === "" || estrutura_produto === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
			}
			else{
					$.ajax({
						url: 'engine/controllers/produto.php',
					   data: {
						   	id_produto : null,
							nome_produto : nome_produto,
							info_produto : info_produto,
							periodo_produto : periodo_produto,
							transporte_produto : transporte_produto,
							hospedagem_produto : hospedagem_produto,
							alimentacao_produto : alimentacao_produto,
							estrutura_produto : estrutura_produto,
							
							action: 'create'
					   },
					   
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								//$('#loader').load('viewers/admin/cadastro/produto.lista.php');
								$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
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
		//$("#valor_produto").mask("R$ 999,99");		
	});
</script>

<?php
	require_once "../../../engine/config.php";
?>

<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1> Cadastro de Produto </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="Voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    
    <!-- Botão salvar
    <button type="button" class="btn btn-success" id="Salvar"> <span class="glyphicon glyphicon glyphicon-floppy-saved" arial-hidden="true"></span> Salvar </button>-->
    
    <button type="button" class="btn btn-success" id="Proximo"> <span class="glyphicon glyphicon-chevron-right" arial-hidden="true"></span> Próximo </button>
    
</section>

<br><br>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome Produto *</span>
  			<input type="text" class="form-control" id="nome_produto" placeholder="Produto" aria-describedby="basic-addon1">
		</div>
    </section>
    
    <!--<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Valor *</span>
  			<input type="text" class="form-control" id="valor_produto" placeholder="R$" aria-describedby="basic-addon1">
		</div>
    </section>-->
    
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Data da Viagem *</span>
            <input type="text" class="form-control" id="periodo_produto" placeholder="Período da Viagem" aria-describedby="basic-addon1"></div>
        </div>
    </section> 
</section>

<br/>

<section class="row formAdicionadrDados">
	<section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Transporte *</span>
  			<textarea type="text" class="form-control" id="transporte_produto" placeholder="Informações sobre o transporte..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section>
</section>

<br>

<section class="row formAdicionadrDados">
	<section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Hospedagem *</span>
  			<textarea type="text" class="form-control" id="hospedagem_produto" placeholder="Informações sobre a hospedagem..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">            
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Alimentação *</span>
  			<textarea type="text" class="form-control" id="alimentacao_produto" placeholder="Informações sobre a alimentação..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">        
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Estrutura Exclusiva<br/>da BRASILTUR *</span>
            <textarea type="text" class="form-control" id="estrutura_produto" placeholder="Informações do Produto..." aria-describedby="basic-addon1" rows="5"></textarea>
        </div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">        
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Informações diversas *</span>
            <textarea type="text" class="form-control" id="info_produto" placeholder="Informações complementares..." aria-describedby="basic-addon1" rows="3"></textarea>
        </div>
    </section>
</section>
<br/>
<input type="hidden" id="fk_id_produto" value="0">