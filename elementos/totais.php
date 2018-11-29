<?php 
/* CÓDIGO QUE EXIBE OS TOTAIS DA METAS PLANEJADAS PELO SETOR*/
require_once dirname(__FILE__).'/../controller.php';
$totais = Controller::getTotal($_GET['cod']);
$orcamentario = number_format($totais[0]->valor,2,",","."); // Converte de String para numeric
$norcamentario = number_format($totais[1]->valor,2,",","."); // Convert de String para numeric
$total = number_format(($totais[0]->valor + $totais[1]->valor), 2,",",".");
?>
<!-- Totais e botão gera documento-->
<div class="well well-lg">
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div class="row">
		<div class="col-lg-4">
			<label>Total  Orçamentário:</label>
			<input type="text" class="form-control" name="orcamentario"  id="orcamentario" value="<?php echo isset($totais)? $orcamentario:'';?>"  style="background: #ccc" readonly>
		</div>
		<div class="col-lg-4">
			<label>Total  Não Orçamentário:</label>
			<input type="text" class="form-control" name="norcamentario"  id="norcamentario" value="<?php echo isset($totais)? $norcamentario:'';?>" style="background: #ccc" readonly>
		</div>
		<div class="col-lg-4">
			<label>Total Planejado:</label>
			<input type="text" class="form-control" name="total"  id="total" value="<?php echo isset($totais)? $total:'';?>" style="background: #ccc" readonly>
		</div>
	</div>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<a type="button" class="btn btn-primary btn-block botao" id="documento" href="formulario.php?cod=<?php echo $_GET['cod'];?>" target="_blank">
				<span class="glyphicon glyphicon-check" aria-hidden="true" align='center'></span> Gerar Documento
			</a>
		</div>
	</div>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
</div><!-- well  botões -->