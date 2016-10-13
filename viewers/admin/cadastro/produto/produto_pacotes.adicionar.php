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
			$('#loader').load('viewers/admin/cadastro/produto.adicionar.php');
		});
		
		$('#Proximo').click(function(e) {
    	    e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto/produto_valores.adicionar.php');
		});
		
		$('.ExcluirItem').click(function(e) {
			e.preventDefault();
			var id = $('#id_produto_pacotes').val();
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/produto_pacotes.php',
				   data: {
						   	id_produto_pacotes : id,
							nome_pacote : null,
							descricao_pacote : null,
							fk_produto : null,

							action: 'delete'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						if(data === 'true'){
							//alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
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
			var nome_pacote = $('#nome_pacote').val();
			var descricao_pacote = $('#descricao_pacote').val();
			var fk_produto = $('#fk_produto').val();
			
			//validar os imputs
			if(nome_pacote === "" || descricao_pacote === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
			}else{
					$.ajax({
						url: 'engine/controllers/produto_pacotes.php',
					   data: {
						   	id_produto_pacotes : null,
							nome_pacote : nome_pacote,
							descricao_pacote : descricao_pacote,
							fk_produto : fk_produto,
							
							action: 'create'
					   },
					   
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								//alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
							}else{
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
<link href="../../../../css/bootstrap.css" rel="stylesheet" type="text/css">


<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1> Cadastro dos Pacotes </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
	<button type="button" class="btn btn-warning" id="Voltar"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
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

<br>

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

<!-- Listar dados referentes ao produto que acaba de ser adicionado -->
<?php
	$Item = new Produto_pacotes();
	$Item = $Item->ReadAll();
	
	$ultimoPac = end($Item); //pegando o último item
	
	// Comparando entradas pelo último produto adicionado
	if($ultimoProd['id_produto'] != $ultimoPac['fk_produto']){
?>
   	<h4 class="well"> Nenhum pacote cadastrado. </h4>
<?php
	}else{
?>
   	<table class="table table-striped table-hover">
		<thead>
    		<tr>
        		<th>Nome do Pacote</th>
            	<th>Descrição</th>
                <th>FK</th>
            	<th class="text-center">Excluir</th>
        	</tr>
    	</thead>
   		<tbody>
        
        <?php
			foreach($Item as $novo){
				if($ultimoProd['id_produto'] == $novo['fk_produto']){
					?>
                    <tr>
	                	<td><?php echo $novo['nome_pacote']; ?></td>
	                	<td><?php echo $novo['descricao_pacote']; ?></td>
    	            	<td><?php echo $novo['fk_produto']; ?></td>
                        
       	   	  			<td class="text-center ExcluirItem" id="<?php echo $novo['id_produto_pacotes']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                        
                        <input type="hidden" id="id_produto_pacotes" value="<?php echo $novo['id_produto_pacotes']; ?>">
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