<script>
	$(document).ready(function(e) {
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});
		
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    	});
		
		$('#bread_usuario').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    	});		
		
		$('#Voltar').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
			});
	
		$('#Salvar').click(function(e){
			e.preventDefault();
			
			//1 instaciar e recuperar valores dos inputs
			var nome_usuario = $('#nome_usuario').val();
			var email_usuario = $('#email_usuario').val();
			var senha_usuario = $('#senha_usuario').val();
			var telfixo_usuario = $('#telfixo_usuario').val();
			var celular_usuario = $('#celular_usuario').val();
			var nivel_usuario = $('#nivel_usuario').val();
			var id_usuario = $('#id_usuario').val();
			
			//2 validar os inputs
			if(nome_usuario === "" || email_usuario === "" || senha_usuario === "" || telfixo_usuario === "" || celular_usuario === "" || nivel_usuario === ""){
				return alert('Todos os campos com (*) devem ser preenchidos!');
			} else {				
				$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
						   	id_usuario : null,
							nome_usuario : nome_usuario,
							email_usuario : email_usuario,
							senha_usuario : senha_usuario,
							telfixo_usuario : telfixo_usuario,
							celular_usuario : celular_usuario,
							nivel_usuario : nivel_usuario,
							
							action: 'create'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item adicionado com sucesso!');
								$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
							} else {
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
							}
					   },
					   
					   type: 'POST'
					});	
				}			
			});
			
	//Máscara abaixo
	$('#telfixo_usuario').mask('(99) 9999-9999');
	$('#celular_usuario').mask('(99) 9-9999-9999');
	
    });
</script>


<?php
	require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Cadastro</a></li>
  <li><a href="#" id="bread_usuario">Usuário</a></li>
  <li class="active">Adicionar Usuário</li>
</ol>

<h1> Cadastro de Usuário </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
  <button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Salvar</button>
</section>

<br><br>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nome *</span>
			<input type="text" class="form-control" id="nome_usuario" placeholder="Nome Completo" required aria-describedby="basic-addon1">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">e-mail *</span>
			<input type="text" class="form-control" id="email_usuario" placeholder="usuario@exemplo.com" required aria-describedby="basic-addon1">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Senha *</span>
			<input type="password" class="form-control" id="senha_usuario" placeholder="Senha" required aria-describedby="basic-addon1">
		</div>
    </section>
</section>

<br>

<section class="row formAdicionarDados">    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Telefone Fixo *</span>
			<input type="text" class="form-control" id="telfixo_usuario" placeholder="Tel. Fixo" required aria-describedby="basic-addon1">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Celular *</span>
			<input type="text" class="form-control" id="celular_usuario" placeholder="Celular" required aria-describedby="basic-addon1">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nível de Acesso *</span>
			<select class="form-control" id="nivel_usuario" required>
            <option value=""> Escolha uma opção </option>
            <option value="admin"> Admin </option>
            <option value="user"> User </option>
		</div>
    </section>
</section>