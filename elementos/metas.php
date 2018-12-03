<?php 
require_once dirname(__FILE__).'/../controller.php';
$metas = Controller::getMetas($_GET['cod']);
?>
<center><h2>MINHAS METAS</h2></center>

<?php 	if ($metas == null){ ?>
	<table class="table"><thead><tr><th><center><i>ESTE SETOR AINDA NÃO CADASTROU NENHUMA META</i></center></th></tr> </th></thead></table>
<?php } else { ?>
	<?php foreach ($metas as $meta) { ?>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
			<div class='panel panel-default'>
				<div class='panel-heading' role='tab' id='headingOne'>
					<div class='row' >
						<div class='col-lg-1' data-toggle='collapse' data-parent='#accordion' href='#collapse<?php echo $meta->id;?>' aria-expanded='true' aria-controls='collapseOne'>
							<img alt="Brand" src="../img/icon-down.png"  class="img-responsive" />
						</div>
						<div class='col-lg-4' data-toggle='collapse' data-parent='#accordion' href='#collapse<?php echo $meta->id;?>' aria-expanded='true' aria-controls='collapseOne'>
							Categoria: <label id="Lcategoria<?php echo $meta->id?>"><?php echo Controller::getCategoria($meta->categoria);?></label>
						</div>
						<div class='col-lg-3' data-toggle='collapse' data-parent='#accordion' href='#collapse<?php echo $meta->id;?>' aria-expanded='true' aria-controls='collapseOne'>
							Prioridade: <label id="Lprioridade<?php echo $meta->id?>"><?php echo Controller::getPrioridade($meta->prioridade);?></label>
						</div>
						<div class='col-lg-3'data-toggle='collapse' data-parent='#accordion' href='#collapse<?php echo $meta->id;?>' aria-expanded='true' aria-controls='collapseOne'>
							Valor: <label id="Lvalor<?php echo $meta->id?>"><?php echo number_format($meta->valor,2,",",".");?></label>
						</div>
						<div class='col-lg-1' title='Deletar Meta'>	
							<a type="button" class="btn btn-danger btn-sm" href="../deletar.php?cod=<?php echo $meta->id;?> &amp setor=<?php echo$_GET['cod'];?>">
								<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
							</a>
						</div>
					</div>
				</div>
				<div id='collapse<?php echo $meta->id;?>' class='panel-collapse collapsing in' role='tabpanel' aria-labelledby='headingOne'>
					<div class='panel-body'>
						<div class="row">
							<div class="col-lg-4">
								<label for="objetivo">Categoria:</label>
								<select class="form-control" name="categoria" id="categoria<?php echo $meta->id?>" onchange="update(<?php echo $meta->id;?>)" required>
									<option value=""noSelected></option>
									<option value="0" <?php echo (isset($meta) and $meta->categoria == '0')? 'selected':'';?>>Acervo</option>
									<option value="1" <?php echo (isset($meta) and $meta->categoria == '1')? 'selected':'';?>>Estrutura Física</option>
									<option value="2" <?php echo (isset($meta) and $meta->categoria == '2')? 'selected':'';?>>Equipamentos, Móveis e Veículos</option>
									<option value="3" <?php echo (isset($meta) and $meta->categoria == '3')? 'selected':'';?>>Gestão Organizacional</option>
									<option value="4" <?php echo (isset($meta) and $meta->categoria == '4')? 'selected':'';?>>Informatização</option>
									<option value="5" <?php echo (isset($meta) and $meta->categoria == '5')? 'selected':'';?>>Materiais</option>
									<option value="6" <?php echo (isset($meta) and $meta->categoria == '6')? 'selected':'';?>>Recursos Humanos</option>
									<option value="7" <?php echo (isset($meta) and $meta->categoria == '7')? 'selected':'';?>>Sustentabilidade</option>
									<option value="8" <?php echo (isset($meta) and $meta->categoria == '8')? 'selected':'';?>>Pesquisa</option>
									<option value="9" <?php echo (isset($meta) and $meta->categoria == '9')? 'selected':'';?>>Extensão</option>
								   <option value="10" <?php echo (isset($meta) and $meta->categoria == '10')? 'selected':'';?>>Assistência Estudantil</option>
									<option value="11" <?php echo (isset($meta) and $meta->categoria == '11')? 'selected':'';?>>Ensino - Geral </option>
								</select>
							</div>
							<div class="col-lg-4">
								<label for="recurso">Recurso:</label>
								<select class="form-control" name="recurso" id="recurso<?php echo $meta->id?>" onchange="update(<?php echo $meta->id;?>)" readonly>
									<option value="" noSelected></option>
									<option value="0" selected>Orçamentário</option>
									<option value="1" <?php echo (isset($meta) and $meta->recurso == '1')? 'selected':'';?>>Não Orçamentário</option>
								</select>
							</div>

							<div class="col-lg-4">
								<label for="trimestre">Prazo:</label>
								<select class="form-control" name="prazo" id="prazo<?php echo $meta->id?>" onchange="update(<?php echo $meta->id;?>)"required>
									<option value="" noSelected></option>
									<option value="0" <?php echo (isset($meta) and $meta->prazo == '0')? 'selected':'';?>>1° Trimestre</option>
									<option value="1" <?php echo (isset($meta) and $meta->prazo == '1')? 'selected':'';?>>2° Trimestre</option>
									<option value="2" <?php echo (isset($meta) and $meta->prazo == '2')? 'selected':'';?>>3° Trimestre</option>
									<option value="3" <?php echo (isset($meta) and $meta->prazo == '3')? 'selected':'';?>>4° Trimestre</option>
								</select>
							</div>

							<div class="col-lg-4">
								<label for="prioridade">Prioridade:</label>
								<select class="form-control" name="prioridade" id="prioridade<?php echo $meta->id?>"  onchange="update(<?php echo $meta->id;?>)"required>
									<option value="" noSelected></option>
									<option value="0" <?php echo (isset($meta) and $meta->prioridade == '0')? 'selected':'';?>>Alta</option>
									<option value="1" <?php echo (isset($meta) and $meta->prioridade == '1')? 'selected':'';?>>Média</option>
									<option value="2" <?php echo (isset($meta) and $meta->prioridade == '2')? 'selected':'';?>>Baixa</option>
								</select>
							</div>

							<div class="col-lg-4">
								<label for="valor">Valor Total Estimado:</label>
								<input type="text" class="form-control" name="valor" id="valor<?php echo $meta->id?>" value="<?php echo isset($meta)? Controller::getValor($meta->valor):'';?>" onblur="update(<?php echo $meta->id;?>)" onkeyup="formatoValor(this.id)" required>
							</div>								  

							<div class="col-lg-4">
								<label for="quantidade">Quantidade:</label>
								<input type="number" class="form-control" name="quantidade"  id="quantidade<?php echo $meta->id?>" value="<?php echo isset($meta)? $meta->quantidade:'';?>"  onblur="update(<?php echo $meta->id;?>)" required>
							</div>
						</div>
						<!--~~~~~~~~~~~~~~~~~~~~~~Descricao~~~~~~~~~~~~~~~~~~~~-->
						<div class="row">
							<div class="col-lg-12">
								<label>Descrição da Meta:</label>
								<textarea rows="5"  class="form-control" name="descricao" id="descricao<?php echo $meta->id?>" onblur="update(<?php echo $meta->id;?>)" required><?php echo isset($meta)? $meta->descricao:'';?></textarea>
							</div>
						</div>
						<!--~~~~~~~~~~~~~~~~~~~~~~~Observações~~~~~~~~~~~~~~~~~~~-->
						<div class="row">
							<div class="col-lg-12">
								<label>Observações:</label>
								<textarea rows="2"  class="form-control" name="observacao" id="observacao<?php echo $meta->id?>" onblur="update(<?php echo $meta->id;?>)" readonly><?php echo isset($meta)? $meta->observacao:'';?></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>
<!-- Botão Nova Meta-->
<div class="row">

	<div class="col-lg-6">
		<a type="button" class="btn  btn-success btn-block botao" href="../index.php">Voltar</a>
	</div>
	<div class="col-lg-6">
		<a type="button" class="btn btn-success btn-block botao" id="novaMeta" href="novaMeta.php?cod=<?php echo $_GET['cod']; ?>">Nova Meta</a>
	</div>
</div>
