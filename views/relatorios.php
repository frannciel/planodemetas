<?php 
require_once dirname(__FILE__).'/../controller.php';
require dirname(__FILE__).'/../template/superior.php'; 

$setores = Controller::getSetores();
$categoria 	= getPost("categoria");
$setor_id	= getPost("setor");
$metas;
$totais;

if ($categoria != '') {

	$metas = Controller::getTodasMetas($categoria);
	$totais = Controller::getTotal($categoria);
		
}elseif ($setor_id != '') {
	$metas = Controller::getMetas($setor_id);
	$totais = Controller::getTotal($setor_id);
}




function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

$numero = 1;
?>
<style type="text/css">

</style>

<div class="panel panel-default sombra">
	<div class="panel-heading">
		<center><h2>PLANO DE METAS INSTITUCIONAL 2019</h2></center>
	</div><!-- painel-heading -->

	<div class="panel-body">
		<div class="well well-lg">
			<div class="row">
				<div class="col-lg-6">
					<form action="relatorios.php" method="POST">
						<div class="col-lg-6">
							<select class="form-control" name="categoria" id="categoria">
								<option value=""noSelected></option>
								<option value="0">Acervo</option>
								<option value="1">Estrutura Física</option>
								<option value="2">Equipamentos, Móveis e Veículos</option>
								<option value="3">Gestão Organizacional</option>
								<option value="4">Informatização</option>
								<option value="5">Materiais</option>
								<option value="6">Recursos Humanos</option>
								<option value="7">Sustentabilidade</option>
								<option value="8">Pesquisa</option>
								<option value="9">Extensão</option>
								<option value="10">Assistência Estudantil</option>
								<option value="11">Ensino - Geral </option>
							</select>
						</div>
						<button type="submit" class="btn btn-success">Filtar</button>
					</form>
				</div>

				<div class="col-lg-6">
					<form action="relatorios.php" method="POST">
						<div class="col-lg-6">
							<select  class="form-control"  name="setor" id="setor">
								<option value="" noSelected></option>
								<?php foreach ($setores as $setor) { ?>
									<option value="./views/listarMetas.php?cod=<?php echo $setor->id;?>"><?php echo $setor->nome;?></option>
								<?php } ?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Buscar</button>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped table-responsive">
					<thead>
						<!--<tr>
							<th>Ordem</th>
							<th>Categoria</th>
							<th>Meta</th>
							<th>Execução</th>
							<th>Prioridade</th>
							<th>Recurso</th>					
							<th>Quantidade</th>
							<th>Valor</th>
						</tr>-->
						<tr>
							<th>Metas Programadas</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($metas as $key => $meta) { ?>
						<!--<tr>
							<td><?php //echo $numero;?></td>
							<td><?php //echo Controller::getCategoria($meta->categoria);?></td>
							<td id="esquerda"><?php //echo $meta->descricao ;?></td>
							<td><?php //echo Controller::getPrazo($meta->prazo)?></td>
							<td><?php //echo Controller::getPrioridade($meta->prioridade);?></td>
							<td><?php //echo Controller::getRecurso($meta->recurso);?></td>
							<td><?php //echo $meta->quantidade;?></td>
							<td><?php //echo Controller::getValor($meta->valor);?></td>				
						</tr>-->
						<tr>
							<td>
								<table  width=100% >
									<tr>
										<td colspan="3" ><b><?php echo nl2br($meta->descricao); ?></td></b>
									</tr>
									<tr>
										<td><b>Categoria:</b> <?php echo Controller::getCategoria($meta->categoria); ?> </td>
										<td><b>Execução:</b> <?php echo Controller::getPrazo($meta->prazo); ?> </td>
										<td><b>Prioridade:</b> <?php echo Controller::getPrioridade($meta->prioridade);?></td>
									</tr>
									<tr>			
										<td><b>Quantidade:</b> <?php echo $meta->quantidade; ?></td>
										<td><b>Recurso:</b> <?php echo Controller::getRecurso($meta->recurso);?></td>
										<td><b>Valor:</b> <?php echo Controller::getValor($meta->valor);?></td>
									</tr>
									<tr>
										<td colspan="3"><b>Unidade Administrativa:</b> </b> <?php echo $meta->observacao; ?></td>
									</tr>

								</table>
								
							</td>
						</tr>
						<?php $numero += 1; }  ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- painel-body -->

	<div class="panel-footer">
		<center><h2>TOTAIS  PLANEJADOS </h2></center>
		<div class="row">
			<div class="col-lg-4">
				<label>Orçamentário:</label>
				<input type="text" class="form-control" name="orcamentario"  id="orcamentario" value="<?php echo $orcamentario;?>"  style="background: #ccc" readonly>
			</div>
			<div class="col-lg-4">
				<label>Não Orçamentário:</label>
				<input type="text" class="form-control" name="norcamentario"  id="norcamentario" value="<?php echo  $norcamentario;?>" style="background: #ccc" readonly>
			</div>
			<div class="col-lg-4">
				<label>Total Planejado:</label>
				<input type="text" class="form-control" name="total"  id="total" value="<?php echo $total;?>" style="background: #ccc" readonly>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-lg-6">
				<div class="col-lg-6">
					Acervo:
				</div>
				<div class="col-lg-6">
					<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="col-lg-6">
					Estrutura Física:
				</div>
				<div class="col-lg-6">
					<div class="progress">
						<div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
			</div>
		</div>-->
	</div>
</div>


<?php require dirname(__FILE__).'/../template/inferior.php';?>

