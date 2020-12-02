<?php 
require_once dirname(__FILE__).'/../controller.php';
require dirname(__FILE__).'/../template/superior.php'; 

$numero =0;
$norcamentario = 0;
$orcamentario = 0;
$dados = Controller::getMetas(getPost("setor"), getPost("ordem"), getPost("categoria"));
$setores = Controller::getSetores();

function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}
?>
<div class="panel panel-default sombra">
	<div class="panel-heading">
		<center><h2>PLANO DE METAS INSTITUCIONAL 2021</h2></center>
	</div><!-- painel-heading -->

	<div class="panel-body">
		<div class="well well-lg">
			<form action="relatorios.php" method="POST">
				<div class="row">
					<div class="col-lg-3">
						<select class="form-control" name="ordem" id="ordem">
							<option value=""noSelected><i>Ordenar por:</i></option>
							<option value="categoria">Categoria</option>
							<option value="prazo">Prazo</option>
							<option value="prioridade">Prioridade</option>
							<option value="quantidade">Quantidade</option>
							<option value="recurso">Recurso</option>
							<option value="valor">Valor</option>
						</select>
					</div>
					<div class="col-lg-3">
						<select class="form-control" name="categoria" id="categoria">
							<option value=""noSelected>Filtar por:</option>
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
					<div class="col-lg-4">
						<select  class="form-control"  name="setor" id="setor">
							<option value="" noSelected>Filtar por:</option>
							<?php foreach ($setores as $setor) { ?>
								<option value="<?php echo $setor->id;?>"><?php echo $setor->nome;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-lg-2">
						<button type="submit" class="btn btn-primary btn-block">Filtar</button>
					</div>
				</div>
			</form>						
		</div>

		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<th><h4>METAS PROGRAMADAS</h4></th>
						</tr>
					</thead>
					<tbody>
						<?php if (empty($dados)) { ?>
							<tr><td><center><i>NEMHUMA META ENCONTRADA DE ACORDO COM OS PARAMETROS INFOMRADOS</i></center></td></tr>
						<?php } else { 
						foreach ($dados as $dado) {
							if ($dado->recurso == '0') {$orcamentario += $dado->valor;}
							if ($dado->recurso == '1') {$norcamentario += $dado->valor;}
							$numero += 1; 
						?>
						<tr>
							<td>
								<table width="100%">
									<tr">
										<td rowspan="4" id="relatorio-num"><?php echo$numero; ?> </td> 
										<td colspan="3" class="col-lg-12"><strong><?php echo strtoupper($dado->setor_nome);?></strong></td>
									</tr>
									<tr>
										<td class="col-lg-5">CATEGORIA:<?php echo Controller::getCategoria($dado->categoria);?> </td>
										<td class="col-lg-3">EXECUÇÃO: <?php echo Controller::getPrazo($dado->prazo);?> </td>
										<td class="col-lg-3">PRIORIDADE: <?php echo Controller::getPrioridade($dado->prioridade);?></td>
									</tr>
									<tr >			
										<td class="col-lg-5">QUANTIDADE: <?php echo $dado->quantidade;?></td>
										<td class="col-lg-3">RECURSO: <?php echo Controller::getRecurso($dado->recurso);?></td>
										<td class="col-lg-3">VALOR:<?php echo Controller::getValor($dado->valor);?></td>
									</tr>
									<tr>
										<td colspan="3" class="col-lg-12" bgcolor="#FFF8DC"><?php echo nl2br($dado->descricao);?></td>
									</tr>
								</table>
							</td>
						</tr>
						<?php }  ?>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- painel-body -->

	<div class="panel-footer">
		<center><h4>TOTAIS  PLANEJADOS </h4></center>
		<div class="row">
			<div class="col-lg-4">
				<label>Orçamentário:</label>
				<input type="text" class="form-control" name="orcamentario"  id="orcamentario" value="<?php echo "R$ ".Controller::getValor($orcamentario);?>"  style="background: #ccc" readonly>
			</div>
			<div class="col-lg-4">
				<label>Não Orçamentário:</label>
				<input type="text" class="form-control" name="norcamentario"  id="norcamentario" value="<?php echo  "R$ ".Controller::getValor($norcamentario);?>" style="background: #ccc" readonly>
			</div>
			<div class="col-lg-4">
				<label>Total Planejado:</label>
				<input type="text" class="form-control" name="total"  id="total" value="<?php echo "R$ ".Controller::getValor($orcamentario + $norcamentario);?>" style="background: #ccc" readonly>
			</div>
		</div><!-- painel-footer -->
	</div>
</div>


<?php require dirname(__FILE__).'/../template/inferior.php';?>

