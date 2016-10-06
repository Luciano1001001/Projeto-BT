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
		
		$('#voltar').click(function(e) {
    	    e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
		});
		
		$('#Proximo').click(function(e) {
    	    e.preventDefault();
			//1 instanciar e recuperar valores dos imputs			
			var nome_pacote = $('#nome_pacote').val();
			var descricao_pacote = $('#descricao_pacote').val();
			
			//validar os imputs
			if(nome_pacote === "" || descricao_pacote === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
			}
			else{
					$.ajax({
						url: 'engine/controllers/produto_pacotes.php',
					   data: {
						   	id_produto_pacotes : null,
							nome_pacote : nome_pacote,
							descricao_pacote : descricao_pacote,
							
							action: 'create'
					   },
					   
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								//$('#loader').load('viewers/admin/cadastro/produto.lista.php');
								$('#loader').load('viewers/admin/cadastro/produto/produto_valores.adicionar.php');
							}

							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
							}
					   },
					   
					   type: 'POST'
					});
				}
		});		
	});
</script>

<?php
	require_once "../../../../engine/config.php";
?>

<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1> Cadastro dos Pacotes </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    <button type="button" class="btn btn-success" id="Proximo"> <span class="glyphicon glyphicon-chevron-right" arial-hidden="true"></span> Próximo </button>
</section>

<br><br>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome do Pacote *</span>
  			<input type="text" class="form-control" id="nome_pacote" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
       
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Descrição *</span>
  			<textarea type="text" class="form-control" id="descricao_pacote" placeholder="Informações sobre o pacote..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section> 
</section>