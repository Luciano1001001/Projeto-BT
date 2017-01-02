// JavaScript Document

$(document).ready(function(e) {
	$('#Link_Cadastro_cliente').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    });
});

$(document).ready(function(e) {
	$('#Link_Cadastro_produto').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/produto.lista.php');
    });
});

$(document).ready(function(e) {
	$('#Link_Cadastro_usuario').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    });
});

$(document).ready(function(e) {
	$('#Link_Gerenciamento_vendas').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/gerenciamento/vendas.lista.php');
    });
});

$(document).ready(function(e) {
	$('#Link_Gerenciamento_maladireta').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/gerenciamento/mala.direta.php');
    });
});

$(document).ready(function(e) {
	$('#cliente-home').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/cliente.lista.php');
    });
});

$(document).ready(function(e) {
	$('#produto-home').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/produto.lista.php');
    });
});

$(document).ready(function(e) {
	$('#usuario-home').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/cadastro/usuario.lista.php');
    });
});

$(document).ready(function(e) {
	$('#vendas-home').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/gerenciamento/vendas.lista.php');
    });
});

$(document).ready(function(e) {
	$('#maladireta-home').click(function(e) {
        e.preventDefault();
		$('#loader').load('viewers/admin/gerenciamento/mala.direta.php');
    });
});

$(document).ready(function(e) {
	$('#boletos-home').click(function(e) {
        e.preventDefault();
        window.open('modules/boleto/boleto_bancoob.php');
    });
});

$(document).ready(function(e) {
	$('#getout').click(function(e) {
		e.preventDefault();
		$.ajax({
		   url: 'engine/controllers/logout.php',
		   data: {

		   },
		   error: function() {
				alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
		   },
		   success: function(data) {
				console.log(data);
				if(data === 'kickme'){
					document.location.href = 'login/';
				}


				else{
					alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
				}
		   },

		   type: 'POST'
		});

  });

});

$(document).ready(function(e) {
	$('#out-home').click(function(e) {
		e.preventDefault();
		$.ajax({
		   url: 'engine/controllers/logout.php',
		   data: {

		   },
		   error: function() {
				alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
		   },
		   success: function(data) {
				console.log(data);
				if(data === 'kickme'){
					document.location.href = 'login/';
				}


				else{
					alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');
				}
		   },

		   type: 'POST'
		});

  });

});
