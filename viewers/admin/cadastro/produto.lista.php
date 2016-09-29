
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
		
		$('#Atualizar').click(function(e) {
    	    e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.lista.php');
		});
	
		$('#Adicionar').click(function(e) {
    	    e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/produto.adicionar.php');
		});
		
		$('.DetalhesItem').click(function(e) {
			e.preventDefault();
			var id = $(this).attr('id');
			//alert(id);
			$('#loader').load('viewers/admin/cadastro/produto/detalhes_produto.lista.php', {id:id});
		});
		
		$('.EditarItem').click(function(e) {
			e.preventDefault();
			var id = $(this).attr('id');
			//alert(id);
			$('#loader').load('viewers/admin/cadastro/produto.editar.php', {id:id});
		});
		
		$('.ExcluirItem').click(function(e) {
			e.preventDefault();

			var id = $(this).attr('id');
			//alert(id);
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/produto.php',
				   data: {
						   	id_produto : id,
							nome_produto : null,
							info_produto : null,
							periodo_produto : null,
							transporte_produto : null,
							hospedagem_produto : null,
							alimentacao_produto : null,
							observacoes_produto : null,
							estrutura_produto : null,

							action: 'delete'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						if(data === 'true'){
							alert('Item deletado com sucesso!');
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
	require_once "../../../engine/config.php";
?>
<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css">


<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Lista de Dados</li>
</ol>

<h1> Lista de Produtos Cadastrados </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-primary" id="Atualizar"> <span class="glyphicon glyphicon-refresh" arial-hidden="true"></span> Atualizar</button>
    <button type="button" class="btn btn-success" id="Adicionar"> <span class="glyphicon glyphicon-plus" arial-hidden="true"></span> Adicionar Dados </button>
</section>

<br><br>

<?php
	$Item = new Produto();
	$Item = $Item->ReadAll();
	
	if(empty($Item)){
		?>
        	<h4 class="well"> Nenhum dado encontrado. </h4>
        <?php
	}
	else {
		?>
        
   	<table class="table table-striped table-hover">
		<thead>
    		<tr>
        		<th>Nome</th>
            	<th>Data da Viagem</th>
            	<th>Informações</th>
                <th class="text-center">Mais Detalhes</th>       	
              	<th class="text-center">Editar</th>
            	<th class="text-center">Excluir</th>
        	</tr>
    	</thead>
   		<tbody>
        	<?php
				foreach($Item as $ItemRow){
			?>
       		<tr>
        		<td><?php echo $ItemRow['nome_produto']; ?></td>
                <td><?php echo $ItemRow['periodo_produto']; ?></td>
            	<td><?php echo $ItemRow['info_produto']; ?></td>
                
                <td class="text-center DetalhesItem" id="<?php echo $ItemRow['id_produto']; ?>"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></td>
               	<td class="text-center EditarItem" id="<?php echo $ItemRow['id_produto']; ?>"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
       	   	  	<td class="text-center ExcluirItem" id="<?php echo $ItemRow['id_produto']; ?>"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td> 
        	</tr>
		  	<?php
				}
			?>
   		</tbody>
 	</table>
        
        <?php
	}
?>