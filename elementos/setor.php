<?php  
require_once dirname(__FILE__).'/../controller.php';
$setor = Controller::getSetor($_GET['cod']);
?>		
<div class="well well-lg">
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div class="row">
		<div class="col-lg-12">
			<label>Diretoria:</label>
			<input type="text" class="form-control" name="diretoria" id="diretoria" value="<?php echo isset($setor) ? Controller::getDiretoria($setor->diretoria):'';?>"  style="background:#ccc" readonly>
		</div>
	</div>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div class="row">
		<div class="col-lg-12">
			<label>Unidade Administrativa:</label>
			<input type="text" class="form-control" name="nome"  id="nome" value="<?php echo isset($setor) ? $setor->nome:'';?>" style="background:#ccc" readonly>
		</div>
	</div>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div class="row">
		<div class="col-lg-6">
			<label>Chefia:</label>
			<input type="text" class="form-control" name="chefia"  id="chefia" value="<?php echo isset($setor) ? $setor->chefia:'';?>" style="background:#ccc" readonly>
		</div>
		<div class="col-lg-6">
			<label>Email:</label>
			<input type="text" class="form-control" name="email" id="email"  value="<?php echo isset($setor) ? $setor->email:'';?>" style="background:#ccc" readonly>
		</div>
	</div>
</div><!--well Setor-->