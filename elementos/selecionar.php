<?php 
/* CÓDIGO RESPONSÁVEL POR SELECIONAR O SETOR OU COODENAÇÃO DESEJADA E REDICRECIONAR PARA A PÁGINA DE DESTINO*/
	$setores = Controller::getSetores();
?>
<div id="bloco1" class="well well-lg">
	<div class="row">
		<div class="col-lg-12">
			<label>Escolha o setor ou coordenação :</label>
			<select  class="form-control"  name="setor" id="setor" onchange="location= this.value;">
				<option value="" noSelected></option>
				<?php foreach ($setores as $setor) { ?>
					<option value="./views/listarMetas.php?cod=<?php echo $setor->id;?>"><?php echo $setor->nome;?></option>
				<?php } ?>
			</select>
		</div>
	</div>       
</div> <!-- well selecao  -->