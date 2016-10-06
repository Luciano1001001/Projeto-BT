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
		
		$('#Salvar').click(function(e) {
    	    e.preventDefault();
			//1 instanciar e recuperar valores dos imputs			
			var valor_produto = $('#valor_produto').val();
			var tipo_produto = $('#tipo_produto').val();
			var grupo_produto = $('#grupo_produto').val();
			var observacoes_produto = $('#observacoes_produto').val();
			var info_pagamento = $('#info_pagamento').val();
			
			/*alert(valor_produto);
			alert(tipo_produto);
			alert(grupo_produto);
			alert(observacoes_produto);
			alert(info_pagamento);*/
			
			//validar os imputs
			if(valor_produto === "" || tipo_produto === "" || grupo_produto === "" || observacoes_produto === "" || info_pagamento === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
			}
			else{
					$.ajax({
						url: 'engine/controllers/produto_valores.php',
					   data: {
						   	id_produto_valores : null,
							valor_produto : valor_produto,
							tipo_produto : tipo_produto,
							grupo_produto : grupo_produto,
							observacoes_produto : observacoes_produto,
							info_pagamento : info_pagamento,							
							
							action: 'create'
					   },
					   
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/admin/cadastro/produto.lista.php');
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

<h1> Cadastro dos Valores </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    <button type="button" class="btn btn-success" id="Salvar"> <span class="glyphicon glyphicon glyphicon-floppy-saved" arial-hidden="true"></span> Salvar </button>
</section>

<br><br>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Valor do Pacote *</span>
  			<input type="text" class="form-control" id="valor_produto" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
       
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Tipo de Apartamento *</span>
  			<textarea type="text" class="form-control" id="tipo_produto" placeholder="Informações sobre o pacote..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section> 
</section>

<br/>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Grupo *</span>
  			<input type="text" class="form-control" id="grupo_produto" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
       
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Observações *</span>
  			<textarea type="text" class="form-control" id="observacoes_produto" placeholder="Informações sobre o pacote..." aria-describedby="basic-addon1" rows="3"></textarea>
		</div>
    </section> 
</section>

<br/>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Pagamento *</span>
  			<input type="text" class="form-control" id="info_pagamento" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
</section>