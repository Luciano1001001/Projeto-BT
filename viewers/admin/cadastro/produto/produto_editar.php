<?php
  require_once "../../../../engine/config.php";

  $ItemProduto = new Produto();
  $ItemProduto = $ItemProduto->ReadAll();
  
  $chave_produto = end($ItemProduto);
  $chave_produto = $chave_produto['id_produto'];
?>

<script>
	$(document).ready(function(e) {
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/mala.direta.php');
    	});
		
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});
		
		$('#inf_produto').click(function(e){
			e.preventDefault();
      var id = "<?php echo $teste; ?>";
			$('#loader').load('viewers/admin/cadastro/produto/produto_editar_info.php', {id : id});
    	});	
		
		$('#inf_pacotes').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.pacote.php');
    	});		
		
		$('#inf_valores').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.cliente.php');
    	});	
	});
</script>
<?php
	require_once "../../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Cadastro</a></li>
  <li class="active">Produto</li>
</ol>

<h1>
	Alterações
</h1>            
<section class="container-fluid text-center">
	<br><br><br><br><br>
  <div class="row">
    <a href="#" id="inf_produto">
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-info-circle fa-5x"></i>
        <h4 class="text-center">Dados do Produto</h4>
    </div>
    </a>
    <a href="#" id="inf_pacotes">	
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-ship fa-5x"></i>
        <h4 class="text-center">Dados dos Pacote</h4>
    </div>
    </a>
    <a href="#" id="inf_valores">
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-money fa-5x"></i>
        <h4 class="text-center">Dados dos Valores</h4>
    </div>
  </a>
  </div>
</section>