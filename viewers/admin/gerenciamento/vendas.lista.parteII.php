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
			var id_produto = $('#id_produto').val();
			var boleto_checado = $('#boleto_checado').val();
			var cartao_checado = $('#cartao_checado').val();
			var cheque_checado = $('#cheque_checado').val();
			var id_cliente = $('#id_cliente').val();


			//2 validar os inputs
			if(false) {
				return alert('Todos os campos devem ser preenchidos!!');
			} else {

				console.log(id_produto);
				console.log(boleto_checado);
				console.log(cartao_checado);
				console.log(cheque_checado);
				console.log(id_cliente);

				$('#loader').load('viewers/admin/gerenciamento/vendas.lista.parteIII.php', {
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

<br>
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

<br><br>

<?php
  if ($_POST['boleto_checado'] === "true") {

    ?>
      <h2>Dados Boleto ?</h2>
    <?php
  }
?>

<?php
  if ($_POST['cartao_checado'] === "true") {

    ?>
      <h2>Dados Cartao</h2>
    <?php
  }
?>

<?php
  if ($_POST['cheque_checado'] === "true") {

    ?>
      <h2>Dados Cheque</h2>
    <?php
  }
?>

<input type="hidden" id="id_produto" value="<?php echo $_POST['id_produto']; ?>">
<input type="hidden" id="boleto_checado" value="<?php echo $_POST['boleto_checado']; ?>">
<input type="hidden" id="cartao_checado" value="<?php echo $_POST['cartao_checado']; ?>">
<input type="hidden" id="cheque_checado" value="<?php echo $_POST['cheque_checado']; ?>">
<input type="hidden" id="id_cliente" value="<?php echo $_POST['id_cliente']; ?>">
