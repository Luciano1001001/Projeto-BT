<script>
	$(document).ready(function(e) {
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    	});
		
		$('#bread_usuario').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    	});
		
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});
		
		$('#Atualizar').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
		});
	
        $('#Adicionar').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/usuario.adicionar.php');
    	});
		
		$('.EditarItem').click(function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$('#loader').load('viewers/admin/cadastro/usuario.editar.php', {id:id});
    	});
		
		$('.ExcluirItem').click(function(e){
			e.preventDefault();
			
			var id = $(this).attr('id');
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
  <li class="active">Lista de Dados</li>
</ol>


<h1> Lista dos Usuários Cadastrados </h1>

<br>

<!-- Button Group -->

<section class="btn-group" role="group" aria-label="...">
	<button type="button" class="btn btn-primary" id="Atualizar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  	<button type="button" class="btn btn-success" id="Adicionar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Dados</button>
</section>

<br><br>

<?php
$Item = new Usuario();
$Item = $Item->ReadAll();
	
if(empty($Item)) {
	?>
		<h4 class="well"> Nenhum dado encontrado. </h4>
   	<?php
} else {
	?>
    <table class="table table-striped table-hover">
    	<thead>
        	<tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone Fixo</th>
                <th>Celular</th>
                <th>Nível de Acesso</th>
                <th>Editar</th>
                <th>Excluir</th>
         	</tr>
    	</thead>
             
        <tbody>
        	<?php
				foreach($Item as $itemRow){
			?>
		    <tr>
            	<td><?php echo $itemRow['nome_usuario']; ?></td>
                <td><?php echo $itemRow['email_usuario']; ?></td>
                <td><?php echo $itemRow['telfixo_usuario']; ?></td>
                <td><?php echo $itemRow['celular_usuario']; ?></td>
                <td><?php echo $itemRow['nivel_usuario']; ?></td>
                <td class="text-center EditarItem" id="<?php echo $itemRow['id_usuario']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
                <td class="text-center ExcluirItem" id="<?php echo $itemRow['id_usuario']; ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td> 
			</tr>
                          
		<?php
			}
		?>
		</tbody>
	</table>
<?php
	}
?>