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
			$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
		});
		
		$('#Salvar').click(function(e) {
    	    e.preventDefault();
			alert("Produto cadastrado com sucesso!")
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
		});
		
		$('#Teste').click(function(e) {
    	    e.preventDefault();
			var observacoes_produto = $('#observacoes_produto').val();
			if(confirm("Salvar?")){
				$.ajax({
				   url: 'engine/controllers/produto_valores.php',
				   data: {
							observacoes_produto : observacoes_produto,

							action: 'update'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
					   console.log(data);
						if(data === 'true'){
							$('#loader').load('viewers/admin/cadastro/produto/produto_valores.adicionar.php');
						}else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
				   },
				   type: 'POST'
				});	
			}
			$('#loader').load('viewers/admin/cadastro/produto/produto_valores.adicionar.php');
		});
		
		$('.ExcluirItem').click(function(e) {
			e.preventDefault();
			var id = $('#id_produto_valores').val();
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/produto_valores.php',
				   data: {
						   	id_produto_valores : id,
							valor_produto : null,
							tipo_produto : null,
							grupo_produto : null,
							observacoes_produto : null,
							info_pagamento : null,
							fk_produto : null,

							action: 'delete'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						if(data === 'true'){
							//alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/produto/produto_valores.adicionar.php');
						}else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
				   },
				   type: 'POST'
				});	
			}
		});
		
		$('#Adicionar').click(function(e) {
    	    e.preventDefault();
			//1 instanciar e recuperar valores dos imputs			
			var valor_produto = $('#valor_produto').val();
			var tipo_produto = $('#tipo_produto').val();
			var grupo_produto = $('#grupo_produto').val();
			var fk_observacoes = 0;
			var info_pagamento = $('#info_pagamento').val();
			var fk_produto = $('#fk_produto').val();
						
			//validar os imputs
			if(valor_produto === "" || tipo_produto === "" || grupo_produto === "" || info_pagamento === ""){
				return alert('Todos os campos com (*) devem ser preenchidos!!!');
			}
			else{
					$.ajax({
						url: 'engine/controllers/produto_valores.php',
					   data: {
						   	id_produto_valores : null,
							valor_produto : valor_produto,
							tipo_produto : tipo_produto,
							grupo_produto : grupo_produto,
							fk_observacoes : fk_observacoes,
							info_pagamento : info_pagamento,
							fk_produto : fk_produto,					
							
							action: 'create'
					   },
					   
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
						   console.log(data);
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
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

<h1> Cadastro dos Valores </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="Voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    <button type="button" class="btn btn-success" id="Salvar"> <span class="glyphicon glyphicon glyphicon-floppy-saved" arial-hidden="true"></span> Salvar</button>
    
    
    <button type="button" class="btn btn-success" id="Teste"> <span class="glyphicon glyphicon glyphicon-floppy-saved" arial-hidden="true"></span> Teste</button>
</section>

<br><br>

<section class="row formAdicionadrDados">
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Tipo de Apartamento *</span>
  			<input type="text" class="form-control" id="tipo_produto" placeholder="Informações sobre o pacote..." aria-describedby="basic-addon1"></textarea>
		</div>
    </section>

	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Valor do Pacote *</span>
  			<input type="text" class="form-control" id="valor_produto" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section> 
</section>

<br/>

<section class="row formAdicionadrDados">
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Grupo *</span>
  			<input type="text" class="form-control" id="grupo_produto" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
    
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Pagamento *</span>
  			<input type="text" class="form-control" id="info_pagamento" placeholder="Exemplo: City Tour..." aria-describedby="basic-addon1">
		</div>
    </section>
</section>

<br/>

<section class="btn-group pull-right" role="group" aria-label="...">
	<button type="button" class="btn btn-success" id="Adicionar"> <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Adicionar</button>
</section>

<br/><br/>

<!-- Pegar ID do produto e passar para a FK de pacote -->
<?php
	$ItemProduto = new Produto();
	$ItemProduto = $ItemProduto->ReadAll();
	
	$ultimoProd = end($ItemProduto); //Pega o último item do array
?>

<input type="hidden" id="fk_produto" value="<?php echo $ultimoProd['id_produto']; ?>">

<?php
	$Item = new Produto_valores();
	$Item = $Item->ReadAll();
	
	$ultimoVal = end($Item); //pegando o último item
	
	// Comparando entradas pelo último produto adicionado
	if($ultimoProd['id_produto'] != $ultimoVal['fk_produto']){
?>
   	<h4 class="well"> Nenhum valor cadastrado. </h4>
<?php
	}else{
?>
   	<table class="table table-striped table-hover">
		<thead>
    		<tr>
        		<th>Tipo de Apartamento</th>
            	<th>Valor </th>
                <th>Grupo </th>
                <th>Pagamento </th>
            	<th class="text-center">Excluir</th>
        	</tr>
    	</thead>
   		<tbody>
        
        <?php
			foreach($Item as $novo){
				if($ultimoProd['id_produto'] == $novo['fk_produto']){
					?>
                    <tr>
	                	<td><?php echo $novo['tipo_produto']; ?></td>
	                	<td><?php echo $novo['valor_produto']; ?></td>
    	            	<td><?php echo $novo['grupo_produto']; ?></td>
                        <td><?php echo $novo['info_pagamento']; ?></td>
                        
       	   	  			<td class="text-center ExcluirItem" id="<?php echo $novo['id_produto_valores']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                        
                        <input type="hidden" id="id_produto_valores" value="<?php echo $novo['id_produto_valores']; ?>">
	        		</tr>
                <?php
				}
			}
			?>
   		</tbody>
 	</table>
        <?php
	}
?>

<br/>

<h3>Observações Gerais</h3>
<section class="row formAdicionadrDados">
	<section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Observações</span>
  			<textarea type="text" class="form-control" id="observacoes_produto" placeholder="Informações sobre o pacote..." aria-describedby="basic-addon1" rows="4"></textarea>
		</div>
    </section>
</section>
<br/>