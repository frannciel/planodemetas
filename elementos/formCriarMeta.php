<!-- Criar  Metas-->
<div class="well well-lg">
	<center><h2>NOVA META</h2></center>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<form action="../plano.php" method="POST">
		<input type="hidden" id="setor" name="setor" value="<?php echo $_GET['cod']?>">
		<div class="row">
			<div class="col-lg-4">
				<label for="objetivo">Categoria:</label>
				<select class="form-control" name="categoria" id="categoria" required>
					<option value=""noSelected></option>
					<option value="0" <?php echo isset($meta) and $meta->categoria == '0'? selected:'';?>>Acervo</option>
					<option value="1" <?php echo isset($meta) and $meta->categoria == '1'? selected:'';?>>Estrutura Física</option>
					<option value="2" <?php echo isset($meta) and $meta->categoria == '2'? selected:'';?>>Equipamentos, Móveis e Veículos</option>
					<option value="3" <?php echo isset($meta) and $meta->categoria == '3'? selected:'';?>>Gestão Organizacional</option>
					<option value="4" <?php echo isset($meta) and $meta->categoria == '4'? selected:'';?>>Informatização</option>
					<option value="5" <?php echo isset($meta) and $meta->categoria == '5'? selected:'';?>>Materiais</option>
					<option value="6" <?php echo isset($meta) and $meta->categoria == '6'? selected:'';?>>Recursos Humanos</option>
					<option value="7" <?php echo isset($meta) and $meta->categoria == '7'? selected:'';?>>Sustentabilidade</option>
					<option value="8" <?php echo isset($meta) and $meta->categoria == '8'? selected:'';?>>Pesquisa</option>
					<option value="9" <?php echo isset($meta) and $meta->categoria == '9'? selected:'';?>>Extensão</option>
					<option value="10" <?php echo isset($meta) and $meta->categoria == '10'? selected:'';?>>Assistência Estudantil</option>
					<option value="11" <?php echo isset($meta) and $meta->categoria == '11'? selected:'';?>>Ensino - Geral </option>
				</select>
			</div>
			<div class="col-lg-4">
				<label for="recurso">Recurso:</label>
				<select class="form-control" name="recurso" id="recurso" required readonly>
					<option value="" noSelected></option>
					<option value="0" selected>Orçamentário</option>
					<option value="1" <?php echo isset($meta) and $meta->recurso == '1'? selected:'';?>>Não Orçamentário</option>
				</select>
			</div>

			<div class="col-lg-4">
				<label for="trimestre">Prazo:</label>
				<select class="form-control" name="prazo" id="prazo" required>
					<option value="" noSelected></option>
					<option value="0" <?php echo isset($meta) and $meta->prazo == '0'? selected:'';?>>1° Trimestre</option>
					<option value="1" <?php echo isset($meta) and $meta->prazo == '1'? selected:'';?>>2° Trimestre</option>
					<option value="2" <?php echo isset($meta) and $meta->prazo == '2'? selected:'';?>>3° Trimestre</option>
					<option value="3" <?php echo isset($meta) and $meta->prazo == '3'? selected:'';?>>4° Trimestre</option>
				</select>
			</div>

			<div class="col-lg-4">
				<label for="prioridade">Prioridade:</label>
				<select class="form-control" name="prioridade" id="prioridade" required>
					<option value="" noSelected></option>
					<option value="0" <?php echo isset($meta) and $meta->prioridade == '0'? selected:'';?>>Alta</option>
					<option value="1" <?php echo isset($meta) and $meta->prioridade == '1'? selected:'';?>>Média</option>
					<option value="2" <?php echo isset($meta) and $meta->prioridade == '2'? selected:'';?>>Baixa</option>
				</select>
			</div>

			<div class="col-lg-4">
				<label for="valor">Valor Total Estimado:</label>
				<input type="text" class="form-control" name="valor" id="valor" value="<?php echo isset($meta)? $meta->valor:'';?>" onkeyup="formatoValor(this.id)" required>
			</div>								  

			<div class="col-lg-4">
				<label for="quantidade">Quantidade:</label>
				<input type="number" class="form-control" name="quantidade"  id="quantidade" value="<?php echo isset($meta)? $meta->quantidade:'';?>" required>
			</div>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="row">
			<div class="col-lg-12">
				<label>Descrição da Meta:</label>
				<textarea rows="5"  class="form-control" name="descricao" id="descricao" value="<?php echo isset($meta)? $meta->descricao:'';?>" required></textarea>
			</div>
		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="row">
			<div class="col-lg-12">
				<label>Observações:</label>
				<textarea rows="2"  class="form-control" name="observacao" id="observacao" value="<?php echo isset($meta)? $meta->observacao:'';?>" readonly></textarea>
			</div>
		</div>
		<!-- Botões criar e minhas metas-->  
		<div class="row">
			<div class="col-lg-4">
				<a type="button" class="btn  btn-success btn-block botao" href="../index.php">Voltar</a>
			</div>

			<div class="col-lg-4">
				<a type="button" class="btn btn-success btn-block botao" href="../views/listarMetas.php?cod=<?php echo $_GET['cod']?>">Minhas Metas</a>
			</div>

			<div class="col-lg-4">
				<button type="submit" class="btn btn-success btn-block botao">Salvar</button>
			</div>
		</div>
	</form>
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
</div><!-- well criar meta-->