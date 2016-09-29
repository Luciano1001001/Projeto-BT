<?php session_start();
	if(empty($_SESSION)){
		?>
		<script>
			document.location.href = 'login/';
		</script>
    <?php
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Brasil Tur</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/brtur.css">
    </head>
    <body>
    	<nav class="navbar navbar-default navbar-fixed-top">
        	<div class="container-fluid"> 
            	<!-- Brand and toggle get grouped for better mobile display -->
	        	<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          			</button>
                     <a class="navbar-brand" href="?" id="">BrasilTur</a>
               	</div>
            
            	<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                  <ul class="nav navbar-nav navbar-right">
				<?php
                   $user = $_SESSION['nivel_user'];
                
                   if ($user === "admin") {
                 ?>
                    <li><a href="#" id="">Bem Vindo <?php echo $_SESSION['name_user'];?> </a>                
                    <li><a href="?" id="">HOME </a></li>
	              	<li class="dropdown">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> CADASTRO <span class="caret"></span></a>
                      	<ul class="dropdown-menu">
                        	<li><a href="#" id="Link_Cadastro_cliente">Cliente</a></li>
                        	<li><a href="#" id="Link_Cadastro_produto">Produto</a></li>
                        	<li><a href="#" id="Link_Cadastro_usuario">Usuário</a></li>
                      	</ul>
    	            </li>
                
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> GERENCIAMENTO <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id="Link_Gerencimento_vendas">Vendas</a></li>
                            <li><a href="#" id="Link_Gerencimento_mala">Mala Direta</a></li>
                            <li><a href="#" id="Link_Gerencimento_boletos">Boletos</a></li>
                        </ul>
                    </li>
                <?php
                 } else {
                     ?>
                     
                     <li><a href="#" id="">Bem Vindo <?php echo $_SESSION['name_user'];?> </a></li>
					 <li><a href="?" id="">HOME </a></li>
					 
					 <?php
				  }
                
                ?>
                <li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR </a></li>
              </ul>
            </div><!-- /.navbar-collapse --> 
          </div><!-- /.container-fluid --> 
        </nav>
        
        <main class="container-fluid" id="loader">
        	<h1 class="text-center"> Bem-Vindo ao Sistema </h1>
            <br><br><br><br><br><br>
        <?php
                    $user = $_SESSION['nivel_user'];
                
                    if ($user === "admin") {
                 ?>
  		<section class="row formAdicionadrDados">
			<section class="col-md-3">
    			<div class="input-group">
					<a href="#" id="cliente-home"><img src="img/clientes.png" class="img-responsive">
                    <h4 class="text-center color-link">Clientes</h4></a>
                </div>
    		</section>
    		<section class="col-md-3">
    			<div class="input-group">
  					<a href="#" id="produto-home"><img src="img/produto.png" class="img-responsive">
                    <h4 class="text-center color-link">Produtos</h4></a>
				</div>
    		</section>
            <section class="col-md-3">
    			<div class="input-group">
  					<a href="#" id="usuario-home"><img src="img/usuario.png" class="img-responsive">
                    <h4 class="text-center color-link"> Usuários </h4></a>
				</div>
    		</section>
            <section class="col-md-3">
    			<div class="input-group">
  					<a href="#" id="out-home"><img src="img/exit-door-sign.png" class="img-rounded">
                    <h4 class="text-center color-link"> Sair Do Sistema </h4></a>
				</div>
    		</section>
		</section>
		<?php
			} else {
				//Questão a ser decidida...
			}
		?>
        </main>
        
		<footer class="brfooter">
        	<p class="text-center"> Copyright © Next Step 2016. Todos os direitos reservados. </p>
        </footer>
        
		<script src="js/jquery.js"></script> 
        <script src="js/bootstrap.js"></script>
        <script src="js/menu.js"></script>
        <script src="js/jquerymask.min.js"></script>
    </body>
</html>