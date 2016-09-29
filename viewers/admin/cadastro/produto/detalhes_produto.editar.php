
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
			//1 instanciar e recuperar valores dos imput
			var id_produto = $('#id_produto').val();
			var nome_produto = $('#nome_produto').val();
			var valor_produto = $('#valor_produto').val();
			var info_produto = $('#info_produto').val();
			
			//validar os imputs
			if(nome_produto === "" || valor_produto === "" || info_produto === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
			}
			else{
					$.ajax({
					   url: 'engine/controllers/produto.php',
					   data: {
						   	id_produto : id_produto,
							nome_produto : nome_produto,
							valor_produto : valor_produto,
							info_produto : info_produto,
							
							action: 'update'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item editado com sucesso!');
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
		
		$('#Excluir').click(function(e) {
			e.preventDefault();	
			var id = $('#id_produto').val();
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/produto.php',
				   data: {				   
						   	id_produto : id,
							nome_produto : null,
							valor_produto : null,
							info_produto : null,

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
		
		//mascaras abaixo
		
	});
</script>

<?php
	require_once "../../../engine/config.php";
?>

<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Editar Dados</li>
</ol>

<h1> Editar Produto </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    <button type="button" class="btn btn-success" id="Salvar"> <span class="glyphicon glyphicon glyphicon-floppy-saved" arial-hidden="true"></span> Salvar </button>
   	<button type="button" class="btn btn-danger" id="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir </button>
</section>

<br><br>

<?php
	$Item = new Produto();
	$Item = $Item->Read($_POST['id']);
?>

<section class="row formAdicionadrDados">
	<section class="col-md-7">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Nome Produto *</span>
  			<input type="text" class="form-control" id="nome_produto" placeholder="Produto" aria-describedby="basic-addon1" value="<?php echo $Item['nome_produto']; ?>">
		</div>
    </section>
    <section class="col-md-5">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Valor *</span>
  			<input type="text" class="form-control" id="valor_produto" placeholder="R$" aria-describedby="basic-addon1" value="<?php echo $Item['valor_produto']; ?>">
		</div>
    </section>
</section>

<br>

<section class="row formAdicionadrDados">
    <section class="col-md-7">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Informações *</span>
  			<textarea type="text" class="form-control" id="info_produto" aria-describedby="basic-addon1" rows="5"> <?php echo $Item['info_produto']; ?> </textarea>
		</div>
    </section>
</section>

<input type="hidden" id="id_produto" value="<?php echo $Item['id_produto']; ?>">
