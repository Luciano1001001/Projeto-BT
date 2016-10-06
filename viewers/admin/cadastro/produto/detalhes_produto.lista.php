
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
		
		$('#Editar').click(function(e) {
			e.preventDefault();
			var id = $('#id_produto').val();
			$('#loader').load('viewers/admin/cadastro/produto.editar.php', {id:id});
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
							info_produto : null,
							periodo_produto : null,
							transporte_produto : null,
							hospedagem_produto : null,
							alimentacao_produto : null,
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
	require_once "../../../../engine/config.php";
?>
<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="../../../../css/bootstrap.css" rel="stylesheet" type="text/css">

<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Detalhes do Produto</li>
</ol>

<h1> Detalhes do Produto </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-warning" id="Voltar"> <span class="glyphicon glyphicon-chevron-left" arial-hidden="true"></span> Voltar</button>
    <button type="button" class="btn btn-primary" id="Editar"> <span class="glyphicon glyphicon-edit" arial-hidden="true"></span> Editar </button>
    <button type="button" class="btn btn-danger" id="Excluir"> <span class="glyphicon glyphicon-remove" arial-hidden="true"></span> Excluir </button>
</section>

<br><br>

<?php
	$Item = new Produto();
	$Item = $Item->Read($_POST['id']);
?>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Nome Produto *</span>
  			<input type="text" class="form-control" id="nome_produto" placeholder="Produto" aria-describedby="basic-addon1" value="<?php echo $Item['nome_produto']; ?>" readonly>
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Data da Viagem *</span>
            <input type="text" class="form-control" id="periodo_produto" placeholder="Período da Viagem" aria-describedby="basic-addon1" value="<?php echo $Item['periodo_produto']; ?>" readonly></div>
        </div>
    </section>
</section>

<br>

<section class="row formAdicionadrDados">
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Transporte *</span>
  			<textarea type="text" class="form-control" id="transporte_produto" placeholder="Informações sobre o transporte..." aria-describedby="basic-addon1" rows="3" readonly><?php echo $Item['transporte_produto']; ?></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Hospedagem *</span>
  			<textarea type="text" class="form-control" id="hospedagem_produto" placeholder="Informações sobre a hospedagem..." aria-describedby="basic-addon1" rows="3" readonly><?php echo $Item['hospedagem_produto']; ?></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">    
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon verde-nx" id="basic-addon1">Alimentação *</span>
  			<textarea type="text" class="form-control" id="alimentacao_produto" placeholder="Informações sobre a alimentação..." aria-describedby="basic-addon1" rows="3" readonly><?php echo $Item['alimentacao_produto']; ?></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon verde-nx" id="basic-addon1">Estrutura Exclusiva<br/>da BRASILTUR *</span>
            <textarea type="text" class="form-control" id="estrutura_produto" placeholder="Informações do Produto..." aria-describedby="basic-addon1" rows="5" readonly><?php echo $Item['estrutura_produto']; ?></textarea>
        </div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon verde-nx" id="basic-addon1">Informações diversas *</span>
            <textarea type="text" class="form-control" id="info_produto" placeholder="Informações complementares..." aria-describedby="basic-addon1" rows="3" readonly><?php echo $Item['info_produto']; ?></textarea>
        </div>
    </section>
</section>
<br/>
<input type="hidden" id="id_produto" value="<?php echo $Item['id_produto']; ?>">