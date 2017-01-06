<script>
	$(document).ready(function(e) {
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    	});
		
		$('#bread_cliente').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    	});
		
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});		
		
		$('#Atualizar').click(function(e) {
			e.preventDefault();

			$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
		});

		$('#Adicionar').click(function(e) {
			e.preventDefault();

			$('#loader').load('viewers/admin/cadastro/cliente.adicionar.php');
		});

		$('.EditarItem').click(function(e) {
			e.preventDefault();

			var id = $(this).attr('id');

			$('#loader').load('viewers/admin/cadastro/cliente.editar.php', { id: id});
		});

		$('.ExcluirItem').click(function(e) {
			e.preventDefault();

			var id = $(this).attr('id');

			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
				   url: 'engine/controllers/cliente.php',
				   data: {
						id_cliente : id,
						action: 'delete'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						console.log(data);
						if(data){
							alert('Item deletado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
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


<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Cadastro</a></li>
  <li><a href="#" id="bread_cliente">Cliente</a></li>
  <li class="active">Lista de Dados</li>
</ol>

<h1>
	Lista de Clientes Cadastrados
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-primary" id="Atualizar"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Atualizar</button>
  <button type="button" class="btn btn-success" id="Adicionar"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Dados</button>
</section>



<br><br>

<?php
	$Item = new Cliente();
	$Item = $Item->ReadAll();

	if(empty($Item)){

		?>
        	<h4 class="well"> Nenhum dado encontrado. </h4>
        <?php
	}else{
		?>

        	<table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
					<th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
					<th>E-mail</th>
					<th>Telefone Fixo</th>
					<th>Celular</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                </thead>

                <tbody>
                	<?php

						foreach($Item as $itemRow){
							//var_dump($itemRow);



					?>
                            <tr class="">
                                <td><?php echo $itemRow['nome_cliente']; ?></td>
                                <td><?php echo $itemRow['cpf_cliente']; ?></td>
								<td><?php echo $itemRow['endereco_cliente']; ?></td>
                                <td><?php echo $itemRow['cidade_cliente']; ?></td>
                                <td><?php echo $itemRow['estado_cliente']; ?></td>
								<td><?php echo $itemRow['email_cliente']; ?></td>
								<td><?php echo $itemRow['telfixo_cliente']; ?></td>
								<td><?php echo $itemRow['celular_cliente']; ?></td>
                                <td class="text-center EditarItem" id="<?php echo $itemRow['id_cliente']; ?>">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </td>
                                <td class="text-center ExcluirItem" id="<?php echo $itemRow['id_cliente']; ?>">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </td>
                            </tr>
                    <?php
						}
					?>
                </tbody>
            </table>

        <?php
	}
?>
