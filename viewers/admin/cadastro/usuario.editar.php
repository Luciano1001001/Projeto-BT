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
			var id_usuario = $('#id_usuario').val();
			var nome_usuario = $('#nome_usuario').val();
			var email_usuario = $('#email_usuario').val();
			var senha_usuario = $('#senha_usuario').val();
			var telfixo_usuario = $('#telfixo_usuario').val();
			var celular_usuario = $('#celular_usuario').val();
			var nivel_usuario = $('#nivel_usuario').val();
			
			//2 validar os inputs
			if(nome_usuario === "" || email_usuario === "" || senha_usuario === "" || telfixo_usuario === "" || celular_usuario === "" || nivel_usuario === ""){
				return alert('Todos os campos com (*) devem ser preenchidos!');
			} 
			else {
				//emailtester entra aqui
				var emailtester = false;
				var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
				emailtester = re.test(email_usuario);
				if(!emailtester){
					
					return alert("Formato de email incorreto. Corrija o campo e tente novamente");
				}
				else{
					$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
						   	id_usuario : id_usuario,
							nome_usuario : nome_usuario,
							email_usuario : email_usuario,
							senha_usuario : senha_usuario,
							telfixo_usuario : telfixo_usuario,
							celular_usuario : celular_usuario,
							nivel_usuario : nivel_usuario,
							
							action: 'update'
					   },
					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							if(data === 'true'){
								alert('Item editado com sucesso!');
								$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
							} else {
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
							}
					   },
					   
					   type: 'POST'
					});	
				}					
			}
		});
		
		$('#Excluir').click(function(e) {
			e.preventDefault();		
			
			var id = $('#id_usuario').val();
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/usuario.php',
				   data: {
					   	id_usuario : id,
						nome_usuario : null,
						email_usuario : null,
						senha_usuario : null,
						telfixo_usuario : null,
						celular_usuario : null,
						nivel_usuario : null,
						
						action: 'delete'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						if(data === 'true'){
							alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
						} else {
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
				   },
				   
				   type: 'POST'
				});	
			}	
		});
		
		//mascaras
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
  <li class="active">Editar Usuário</li>
</ol>

<h1> Editar Usuário </h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
  <button type="button" class="btn btn-success" id="Salvar"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Salvar</button>
  <button type="button" class="btn btn-danger" id="Excluir"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir</button>
</section>

<br><br>

<?php
	$Item = new Usuario();
	$Item = $Item->Read($_POST['id']);
?>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nome *</span>
			<input type="text" class="form-control" id="nome_usuario" placeholder="Nome Completo" required aria-describedby="basic-addon1" value="<?php echo $Item['nome_usuario']; ?>">
		</div>
    </section>
       
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">e-mail *</span>
			<input type="text" class="form-control" id="email_usuario" placeholder="usuario@exemplo.com" required aria-describedby="basic-addon1" value="<?php echo $Item['email_usuario']; ?>">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Senha *</span>
			<input type="password" class="form-control" id="senha_usuario" placeholder="Senha" required aria-describedby="basic-addon1" value="<?php echo $Item['senha_usuario']; ?>">
		</div>
    </section>    
</section>

<br>

<section class="row formAdicionarDados">
	<section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Telefone Fixo *</span>
			<input type="text" class="form-control" id="telfixo_usuario" placeholder="Tel. Fixo" required aria-describedby="basic-addon1" value="<?php echo $Item['telfixo_usuario']; ?>">
		</div>
    </section>
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Celular *</span>
			<input type="text" class="form-control" id="celular_usuario" placeholder="Celular" required aria-describedby="basic-addon1" value="<?php echo $Item['celular_usuario']; ?>">
		</div>
    </section>
    
    
    
    <section class="col-md-4">
    	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nível de Acesso *</span>
			<select class="form-control" id="nivel_usuario" required>
            <option value="admin" <?php if($Item['nivel_usuario'] == "admin") echo 'selected' ?>> admin </option>
            <option value="user" <?php if($Item['nivel_usuario'] == "user") echo 'selected' ?>> user </option>
		</div>
    </section>
</section>

<input type="hidden" id="id_usuario" value="<?php echo $Item['id_usuario'];?>">