<?php require dirname(__FILE__).'/../template/superior.php'; ?>
<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-default sombra">
			<div class="panel-heading">
				<center><h1>PLANO DE METAS INSTITUCIONAL 2020</h1></center>
			</div><!-- painel-heading -->

			<div class="panel-body">
				<?php require dirname(__FILE__).'/../elementos/setor.php'; ?>

				<?php require dirname(__FILE__).'/../elementos/metas.php'; ?>
				
				<?php require dirname(__FILE__).'/../elementos/totais.php';?>
			</div>
		</div>
	</div>
	<div class="col-lg-2">
		<div class="alert alert-success sombra alerta" role="alert" id="sucesso">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			Salvo com Sucesso
		</div>
		<div class="alert alert-danger sombra alerta" role="alert" id="error">
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			Falha ao Salvar
		</div>
	</div>

</div>

<?php require dirname(__FILE__).'/../template/inferior.php';?>
