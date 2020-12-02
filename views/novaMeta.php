<?php 
	require dirname(__FILE__).'/../template/superior.php';
?>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-default sombra">
			<div class="panel-heading">
				<center><h1>PLANO DE METAS INSTITUCIONAL 2021</h1></center>
			</div><!-- painel-heading -->

			<div class="panel-body">
				<!-- SELECIONAR SETOR -->
				<?php require dirname(__FILE__).'/../elementos/setor.php';?>

				<?php require dirname(__FILE__).'/../elementos/formCriarMeta.php';?>

				<?php require dirname(__FILE__).'/../elementos/totais.php';?>

			</div> <!-- painel-body -->
		</div><!-- panel -->
	</div>
	
	<div class="col-lg-4">
		<!-- ORÇAMENTO DO COMPUS -->
		<?php require dirname(__FILE__).'/../elementos/orcamento.php'; ?>
	</div>
</div>

<?php require dirname(__FILE__).'/../template/inferior.php'; ?>
