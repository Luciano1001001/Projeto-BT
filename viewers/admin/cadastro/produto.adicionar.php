<!-- As variáveis de nome "flag" se referem ao atributo "controle" da tabela "produto_controle" -->

<?php
	require_once "../../../engine/config.php";
				
	$Check = new Produto_controle;
	$Check = end($Check->ReadAll()); // Lendo tabela e pegando o último item add nela
				
	$flag = $Check['controle'];
	
	$Produto = new Produto();
	$Produto = end($Produto->ReadAll()); // Lendo tabela e pegando o último item add nela
	
	$ultimoProd = $Produto['id_produto'];
?>


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
		
		$('#Cancelar').click(function(e){
    	    e.preventDefault();
			
			var id = "<?php echo $ultimoProd; ?>";
			var flag_produto = "<?php echo $flag; ?>";
			
			// Se o flag for = 0, quer dizer que o produto não foi adicionado
			if(flag_produto == 0){
				alert('Nenhum produto adicionado.')
				$('#loader').load('viewers/admin/cadastro/produto.lista.php');
			}else{
				if(confirm("Excluir informações já inseridas?")){
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
					   console.log(data);
						if(data === 'true'){
							alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/produto.lista.php');
						}else{
							alert('Erro ao conectar com banco de dados. Tente novamente em alguns instantes.');	
						}
				   },
				   
				   type: 'POST'
				});
				}
			}
		});
		
		$('#Proximo').click(function(e) {
    	    e.preventDefault();
			var nome_produto = $('#nome_produto').val();
			var info_produto = $('#info_produto').val();
			var periodo_produto = $('#periodo_produto').val();
			
			//Novos dados
			var transporte_produto = $('#transporte_produto').val();
			var hospedagem_produto = $('#hospedagem_produto').val();
			var alimentacao_produto = $('#alimentacao_produto').val();
			var estrutura_produto = $('#estrutura_produto').val();
			//Fim dos novos dados

			var controle = "<?php echo $Check['controle']; ?>";

			if(controle == 1){
				$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
			} else {
				if(nome_produto === "" || info_produto === "" || periodo_produto === "" || transporte_produto === "" || hospedagem_produto === "" || alimentacao_produto === "" || estrutura_produto === ""){
				return alert('Todods os campos com (*) devem ser preenchidos!!!');
					}else{
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
									$('#loader').load('viewers/admin/cadastro/produto/produto_pacotes.adicionar.php');
								} else {
									alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
								}
						   },
						   
						   type: 'POST'
						});
					}
			}
		});
	});
</script>

<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css">

<ol class="breadcrumb">
	<li><a href="#" id="bread_home">Home</a></li>
    <li><a href="#" id="bread_cadastro">Cadastro</a></li>
    <li><a href="#" id="bread_produto">Produto</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1> Cadastro de Produto </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
    <button type="button" class="btn btn-danger" id="Cancelar"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Cancelar</button>
    
    <button type="button" class="btn btn-success" id="Proximo"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> Próximo </button>
    
</section>

<br><br>

<?php	
	$ler = 0; // ler dados já existentes no banco sobre o dado produto
	
	if($Check['fk_produto'] == $Produto['id_produto']){
		if($flag != 0){
			$ler = 1;
		}
	}
?>

<section class="row formAdicionadrDados">
	<section class="col-md-4">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome Produto *</span>
  			<input type="text" class="form-control" id="nome_produto" aria-describedby="basic-addon1" placeholder="Produto" <?php if($ler == 1){ ?> value="<?php echo $Produto['nome_produto']; }?>">
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">   
    <section class="col-md-4">
    	<div class="input-group">
        	<span class="input-group-addon" id="basic-addon1">Data da Viagem *</span>
            <input type="text" class="form-control" id="periodo_produto" placeholder="Período da Viagem" aria-describedby="basic-addon1" <?php if($ler == 1){ ?> value="<?php echo $Produto['periodo_produto']; }?>"></div>
        </div>
    </section> 
</section>

<br/>

<section class="row formAdicionadrDados">
	<section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Transporte *</span>
  			<textarea type="text" class="form-control" id="transporte_produto" placeholder="Informações sobre o transporte..." aria-describedby="basic-addon1" rows="3"><?php if($ler == 1){ echo $Produto['transporte_produto']; }?></textarea>
		</div>
    </section>
</section>

<br>

<section class="row formAdicionadrDados">
	<section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Hospedagem *</span>
  			<textarea type="text" class="form-control" id="hospedagem_produto" placeholder="Informações sobre a hospedagem..." aria-describedby="basic-addon1" rows="3"><?php if($ler == 1){ echo $Produto['hospedagem_produto']; }?></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">            
    <section class="col-md-8">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Alimentação *</span>
  			<textarea type="text" class="form-control" id="alimentacao_produto" placeholder="Informações sobre a alimentação..." aria-describedby="basic-addon1" rows="3"><?php if($ler == 1){ echo $Produto['alimentacao_produto']; }?></textarea>
		</div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">        
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Estrutura Exclusiva<br/>da BRASILTUR *</span>
            <textarea type="text" class="form-control" id="estrutura_produto" placeholder="Informações do Produto..." aria-describedby="basic-addon1" rows="5"><?php if($ler == 1){ echo $Produto['estrutura_produto']; }?></textarea>
        </div>
    </section>
</section>

<br/>

<section class="row formAdicionadrDados">        
    <section class="col-md-8">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Informações diversas *</span>
            <textarea type="text" class="form-control" id="info_produto" placeholder="Informações complementares..." aria-describedby="basic-addon1" rows="3"><?php if($ler == 1){ echo $Produto['info_produto']; }?></textarea>
        </div>
    </section>
</section>
<br/>