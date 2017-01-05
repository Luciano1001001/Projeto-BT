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
        <link rel="icon" type="image/jpg" href="img/1604803_225802030948116_568099413_n.jpg"/>
        <title>Brasil Tur</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/brtur.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body>
    	<nav class="brtbars navbar navbar-default">
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
                     <a class="navbar-brand" href="?" id=""><img src="img/brtur_gray.png" class="img-responsive img-logo" width="150"> </a>
               	</div>
            
            	<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                  <ul class="nav navbar-nav navbar-right">
				<?php
                   $user = $_SESSION['nivel_user'];
                
                   if ($user === "admin") {
                 ?>
                    <li><a class="" id="">Bem Vindo <?php echo $_SESSION['name_user'];?> </a></li>               
                    <li><a href="?" id=""><i class="fa fa-home" aria-hidden="true"></i> HOME </a></li>
                    
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
                        <li><a href="#" id="Link_Gerenciamento_vendas">Vendas</a></li>
                        <li><a href="#" id="Link_Gerenciamento_maladireta">Mala Direta</a></li>
                        <li><a href="#" id="Link_Gerenciamento_boletos">Boletos</a></li>
                      </ul>
                	</li>
                	
                <?php
                 } else {
                     ?>
                     
                     <li><a class="" id="">Bem Vindo <?php echo $_SESSION['name_user'];?> </a></li>
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
            <br> <br>
        <?php
                    $user = $_SESSION['nivel_user'];
                
                    if ($user === "admin") {
                 ?>
                 
            <section class="container-fluid text-center">
              <h2>Cadastro</h2>
              <br>
              <div class="row">
                <a href="#" id="cliente-home">
                <div class="col-md-4 fundo-cor">
					<i class="fa fa-users fa-5x"></i>
                    <h4 class="text-center">Clientes</h4>
                </div>
				</a>
                <a href="#" id="produto-home">	
                <div class="col-md-4 fundo-cor">
                  	<i class="fa fa-archive fa-5x"></i>
                    <h4 class="text-center">Produtos</h4>
                </div>
                </a>
                <a href="#" id="usuario-home">
                <div class="col-md-4 fundo-cor">
                   	<i class="fa fa-user fa-5x"></i>
                    <h4 class="text-center"> Usuários </h4>
                </div>
              </a>
              </div>
            </section>
            
           <section class="container-fluid text-center">
              <h2>Gerenciamento</h2>
              <br>
              <div class="row">
              
              	<a href="#" id="vendas-home">
                <div class="col-md-4 fundo-cor">
					<i class="fa fa-money fa-5x"></i>
                    <h4 class="text-center">Vendas</h4>
                </div>
                </a>
                <a href="#" id="maladireta-home">
                <div class="col-md-4 fundo-cor">
                  	<i class="color-link fa fa-envelope fa-5x"></i>
                    <h4 class="text-center color-link">Mala Direta</h4>
                </div>
                </a>
                <a href="#" id="boletos-home">
                <div class="col-md-4 fundo-cor">
                   	<i class="color-link fa fa-file fa-5x"></i>
                    <h4 class="color-link"> Boletos </h4>
                </div>
                </a>
              </div>
            </section>
            
		<?php
         } else {
               
          }
         ?>	
        <!-- Aqui eu veno o que foi alterado no meu código e posso escolher se salvo ou não -->
        </main>
        
        <footer class="brtfooter brtbars navbar navbar-default navbar-fixed-bottom">
        	<div class="container">
        		<p class="text-center navbar-text"> Copyright © <a href="http://nxstep.com.br/" target="_blank" >Next Step</a> 2016. Todos os direitos reservados. </p>
        	</div>
        </footer>
        <!-- Eu posso ter adicionado mais linhas ou apagado e tudo aparece aqui-->
		<script src="js/jquery.js"></script> 
        <script src="js/bootstrap.js"></script>
        <script src="js/menu.js"></script>
        <script src="js/jquerymask.min.js"></script>
        
    </body>
</html>