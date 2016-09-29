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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>
    	<nav class="navbar navbar-default navbar-fixed-top ">
        	<div class="container-fluid"> 
            	<!-- Brand and toggle get grouped for better mobile display -->
	        	<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            			<span class="sr-only">Toggle navigation</span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
            			<span class="icon-bar"></span>
          			</button>
					<!-- <a class="navbar-brand" href="#" id="">Sistema de Treinamento NS</a> -->
                     <a class="navbar-brand" href="?" id="">BrasilTur <i class="fa fa-map-marker"></i> </a>
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
                	
                <?php
                 } else {
                     ?>
                     
                     <li><a class="" href="#" id="">Bem Vindo <?php echo $_SESSION['name_user'];?> </a></li>
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
            <br> <br> <br>  <br> <br> <br>
        <?php
                    $user = $_SESSION['nivel_user'];
                
                    if ($user === "admin") {
                 ?>
                 
            <section class="container-fluid text-center">
              <div class="row">
                <div class="col-md-3">
					<a href="#" id="cliente-home"><i class="color-link fa fa-users fa-5x"></i>
                    <h4 class="text-center color-link">Clientes</h4></a>
                    <br><br>
                </div>
                <div class="col-md-3">
                  	<a href="#" id="produto-home"><i class="color-link fa fa-archive fa-5x"></i>
                    <h4 class="text-center color-link">Produtos</h4></a>
                    <br><br>
                </div>
                <div class="col-md-3">
                   	<a href="#" id="usuario-home"><i class="color-link fa fa-user fa-5x"></i>
                    <h4 class="color-link"> Usuários </h4></a>
                    <br><br>
                </div>
                <div class="col-md-3">
  					<a href="#" id="out-home"><i class="color-link fa fa-sign-out fa-5x"></i>
                    <h4 class="text-center color-link"> Sair Do Sistema </h4></a>
                </div>
              </div>
            </section>
		<?php
         } else {
               
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