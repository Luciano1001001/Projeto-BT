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
		
		$('#para-todos').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.todos.php');
    	});	
		
		$('#por-pacote').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.pacote.php');
    	});		
		
		$('#por-cliente').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.cliente.php');
    	});	
	});
</script>
<?php
	require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Gerenciamento</a></li>
  <li class="active">Mala Dire</li>
</ol>

<h1>
	Tipo de Envio
</h1>            
<section class="container-fluid text-center">
	<br><br><br><br><br>
  <div class="row">
    <a href="#" id="para-todos">
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-users fa-5x"></i>
        <h4 class="text-center">Para Todos</h4>
    </div>
    </a>
    <a href="#" id="por-pacote">	
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-archive fa-5x"></i>
        <h4 class="text-center">Por Pacote</h4>
    </div>
    </a>
    <a href="#" id="por-cliente">
    <div class="col-md-4 fundo-cor">
        <i class="fa fa-user fa-5x"></i>
        <h4 class="text-center">Por Cliente</h4>
    </div>
  </a>
  </div>
</section>