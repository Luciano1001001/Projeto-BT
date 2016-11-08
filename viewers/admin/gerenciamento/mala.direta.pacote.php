<script>
	$(document).ready(function(e) {
		$('#bread_cadastro').click(function(e){
			e.preventDefault();
			location.reload();
    	});
		
		$('#bread_cliente').click(function(e){
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.php');
    	});
		
		$('#bread_home').click(function(e){
			e.preventDefault();
			location.reload();
    	});	
		
		$('#Voltar').click(function(e) {
			e.preventDefault();
			$('#loader').load('viewers/admin/gerenciamento/mala.direta.php');
		});

	});
</script>

<?php
	require_once "../../../engine/config.php";
?>

<br>
<ol class="breadcrumb">
  <li><a href="#" id="bread_home">Home</a></li>
  <li><a href="#" id="bread_cadastro">Gerenciamento</a></li>
  <li><a href="#" id="bread_cliente">Mala Direta</a></li>
  <li><a href="#" id="bread_cliente">Tipo de Envio</a></li>
  <li class="active">Envio Por Pacote</li>
</ol>

<h1>
	Envio Por Pacote
</h1>

<br>

<section class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-warning" id="Voltar"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</button>
   <button type="button" class="btn btn-primary" id="Enviar"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</button>
</section>

<br><br>

<form method="post" action="sendmail.pacote.php" >
<fieldset>
<section class="row formAdicionadrDados">
<section class="col-md-2"></section> 
<section class="col-md-8">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Assunto *</span>
		<input type="text" class="form-control" id="assunto" placeholder="Assunto" aria-describedby="basic-addon1">
	</div>
</section>
<section class="col-md-2"></section> 
</section>

<br>

<section class="row formAdicionadrDados">
<section class="col-md-2"></section>        
    <section class="col-md-8">
        <div class="input-group">
            <textarea type="text" class="form-control" id="mensagem" placeholder="Digite a Mensagem..." aria-describedby="basic-addon1" cols="150" rows="10"></textarea>
        </div>
    </section>
<section class="col-md-2"></section>
</section>

<br>

<section class="col-md-2"></section>
<section class="col-md-5">
  	<div class="input-group">
       <span class="input-group-addon" id="basic-addon1">Pacote *</span>
          <select class="form-control" id="id_produto_pacotes">
          		<option value=""> Escolha uma opção </option>
                <?php
					$Produto_pacotes = new Produto_pacotes();
					$Produto_pacotes = $Produto_pacotes->ReadAll();
					foreach($Produto_pacotes as $produto_pacote){
				?>
               <option value="<?php echo $produto_pacote['id_produto_pacotes']; ?>"><?php echo $produto_pacote['nome_pacote']; ?></option>
                <?php
					}
				?>	
       </select>
    </div>
</section>
    <button type="submit" name="Submit" value="Enviar" class="initial2 btn btn-primary"> Enviar </button>
     <button type="reset" name="Clear" value="Limpar" class="initial1"> Limpar </button>
</fieldset>
</form>