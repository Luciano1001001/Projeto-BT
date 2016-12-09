
<script>
	$(document).ready(function(e) {
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});

		$('#bread_gerenciamento').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/vendas.lista.php');
    	});

		$('#bread_vendas').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/cadastro/vendas.lista.php');
    	});

		$('#Cancelar').click(function(e) {
			e.preventDefault();
			location.reload();
		});

		$('#Proximo').click(function(e) {
			e.preventDefault();

			//1 instansciar e recuperar valores dos inputs
			var id_produto = $('input[name=optionsRadios]').filter(':checked').val();
			var boleto_checado = $("#boleto").is(":checked");
			var cartao_checado = $("#cartao").is(":checked");
			var cheque_checado = $("#cheque").is(":checked");
			var id_cliente = $('#cliente_select option:selected').val();


			//2 validar os inputs
			if(!$('input[name=optionsRadios]').is(':checked') || id_produto === "" || (id_cliente === "") || (!boleto_checado && !cartao_checado && !cheque_checado )) {
				return alert('Todos os campos devem ser preenchidos!!');
			} else {

				console.log(id_produto);
				console.log(boleto_checado);
				console.log(cartao_checado);
				console.log(cheque_checado);
				console.log(id_cliente);

				$('#loader').load('viewers/admin/gerenciamento/vendas.lista.parteII.php', {
					id_produto: id_produto,
					boleto_checado: boleto_checado,
					cartao_checado: cartao_checado,
					cheque_checado: cheque_checado,
					id_cliente: id_cliente
				});


/*
				$.ajax({
				   url: 'viewers/admin/cadastro/vendas.lista.parteII.php',
				   data: {
						 	id_cliente : null,
					 	 	nome_cliente : nome_cliente,
					 	 	email_cliente : email_cliente,
							dtnascimento_cliente : dtnascimento_cliente,
			 				rg_cliente : rg_cliente,
			 				cpf_cliente : cpf_cliente,
			 				endereco_cliente : endereco_cliente,
							cidade_cliente : cidade_cliente,
							estado_cliente : estado_cliente,
			 				cep_cliente : cep_cliente,
			 				telfixo_cliente : telfixo_cliente,
			 				dtcadastro_cliente : dtcadastro_cliente,
			 				celular_cliente : celular_cliente,
							action: 'create'
				   },
				   error: function() {
						alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
				   },
				   success: function(data) {
						console.log(data);
						if(data === 'true'){
							alert('Item adicionado com sucesso!');
							$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
						}

						else{
							alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
						}
				   },

				   type: 'POST'
				});
*/
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
    <li><a href="#" id="bread_gerenciamento">Gerenciamento</a></li>
    <li><a href="#" id="bread_vendas">Vendas</a></li>
    <li class="active">Lista de Dados</li>
</ol>

<h1 class="text-center">Venda de Produtos</h1>
<br><br>

	<section class="btn-group" role="group" aria-label="...">
		<button type="button" class="btn btn-warning" id="Cancelar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Cancelar</button>
		<button type="button" class="btn btn-success" id="Proximo"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span> Próximo</button>
	</section>

	<?php
		// cliente
		$Clientes = new Cliente();
		$Clientes = $Clientes->ReadAll();

	?>
	<h3>Cliente:
		<select id="cliente_select" name="select">
			<option value="" selected=""></option>
			<?php
				foreach ($Clientes as $Cliente) {
					?>
						<option value="<?php echo $Cliente['id_cliente']; ?>"><?php echo $Cliente['nome_cliente']; ?> - <?php echo $Cliente['cpf_cliente']; ?></option>
					<?php
				}
			?>
		</select>
	</h3>

	<br>

	<form>
		<fieldset>
			<legend>Formas de Pagamento</legend>
			<input type="checkbox" name="pagamento" id="boleto" value="boleto">Boleto<br>
			<input type="checkbox" name="pagamento"id="cartao" value="cartao">Cartão<br>
			<input type="checkbox" name="pagamento" id="cheque" value="cheque">Cheque<br>
     	<!--input type="submit" value="Submit now" /-->
		 </fieldset>
	</form>

<h2> Lista de Pacotes </h2>

<br>

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
						<th>Vender</th>
        		<th>Nome</th>
            <th>Data da Viagem</th>
            <th>Informações</th>
            <th>Valor</th>
        	</tr>
    	</thead>
   		<tbody>
        	<?php
				foreach($Item as $ItemRow){
			?>
       		<tr>
						<td class="align-center">
								<div class="radio">
								  <label>
								    <input type="radio" name="optionsRadios" value="<?php echo $ItemRow['id_produto']; ?>">
								  </label>
								</div>
						</td>
        		<td><?php echo $ItemRow['nome_produto']; ?></td>
            <td><?php echo $ItemRow['periodo_produto']; ?></td>
            <td><?php echo $ItemRow['info_produto']; ?></td>
						<td><?php echo $ItemRow['id_produto']; ?></td>
            <!--td class="text-center DetalhesItem" id="< ?php echo $ItemRow['id_produto']; ?>"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></td>
						<td class="text-center VenderItem" id="< ?php echo $ItemRow['id_produto']; ?>"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></td-->
        	</tr>
		  	<?php
				}
			?>
   		</tbody>
 	</table>

        <?php
	}
?>










<!--
<br><br>

<h1> Lista de Produtos Vendidos </h1>

<br>

< ?php
	$ItemVenda = new Venda_produto();
	$ItemVenda = $ItemVenda->ReadAll();

	if(empty($ItemVenda)){
		?>
        	<h4 class="well"> Nenhum dado encontrado. </h4>
        < ?php
	}
	else {
		?>

   	<table class="table table-striped table-hover">
		<thead>
    		<tr>
						<th>Data da Venda</th>
        		<th>Nome</th>
            <th>Data da Viagem</th>
            <th>Informações</th>
        	</tr>
    	</thead>
   		<tbody>
        	< ?php
				foreach($ItemVenda as $ItemRow){
					$ItemProduto = new Produto();
					$ItemProduto = $ItemProduto->Read($ItemRow['id_produto']);
			?>
       		<tr>
						<td>< ?php echo $ItemRow['data_venda']; ?></td>
        		<td>< ?php echo $ItemProduto['nome_produto']; ?></td>
            <td>< ?php echo $ItemProduto['periodo_produto']; ?></td>
            <td>< ?php echo $ItemProduto['info_produto']; ?></td>
        	</tr>
		  	< ?php
				}
			?>
   		</tbody>
 	</table>

        < ?php
	}
?>
-->
