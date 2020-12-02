<?php 
	require_once dirname(__FILE__).'/../controller.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
	<script src='https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js'></script>
	<style type="text/css">
		button {
			width:300px;  
			height:40px; 
			margin-top:2%; 
			background:#228B22; 
			color:#fff; 
			border-radius:10px;
	}
	</style>
</head>
<body>
<div id="formulario">
<center><h2>Plano de Metas Institucional 2021</h2></center>
<div>
<?php 
	$setor = Controller::getSetor($_GET['cod']);
?>
<h4>
	Diretoria: <?php echo Controller::getDiretoria($setor->diretoria);?></br>
	Unidade Administrativa: <?php echo $setor->nome; ?></br>
	Chefia: <?php echo $setor->chefia; ?> </br>
	E-mail: <?php echo $setor->email; ?></br>
</h4>


<center><h3>Metas Planejadas</h3></center>
<?php 
	$metas = Controller::getMetas($_GET['cod']);
	foreach ($metas as $meta) {
?>
<table  width=100% frame="box" ><tr><th><center><?php echo Controller::getCategoria($meta->categoria); ?></center></th></tr>
	<tr>
		<td>
			<table frame="hsides" width=100% bgcolor="#ECE7E7">
				<tr>
					<td colspan="3"><b>Meta:</b> <?php echo nl2br($meta->descricao); ?></td>
				</tr>
				<tr>
					<td><b>Categoria:</b> <?php echo Controller::getCategoria($meta->categoria) ?> </td>
					<td><b>Execução:</b> <?php echo Controller::getPrazo($meta->prazo); ?> </td>
					<td><b>Prioridade:</b> <?php echo Controller::getPrioridade($meta->prioridade);?></td>
				</tr>
				<tr>			
					<td><b>Quantidade:</b> <?php echo $meta->quantidade; ?></td>
					<td><b>Recurso:</b> <?php echo Controller::getRecurso($meta->recurso);?></td>
					<td><b>Valor:</b> <?php echo Controller::getValor($meta->valor);?></td>
				</tr>
				<tr>
					<td colspan="3"><b>Observações:</b> </b> <?php echo $meta->observacao; ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<?php 
	}
?>

</br>
<center><h3>Totais Planejados</h3></center>
<?php
	$totais = Controller::getTotal($_GET['cod']);
?>
<table width=100% frame="box">
	<tr>
		<td align="center"><b>Total Orçamentário:</b>	<?php echo Controller::getValor($totais[0]->valor);?></td>
		<td align="center"><b>Total não Orçamentário:</b> <?php echo Controller::getValor($totais[1]->valor);?>	</td>
		<td align="center"><b>Total Planejado:</b>		<?php echo Controller::getValor($totais[0]->valor + $totais[1]->valor);?></td>
	</tr>
</table>
</br>
</div>

<center>
	<button id="botao" class='btn btn-success' data-clipboard-action='copy' data-clipboard-target='#formulario'>COPIAR</button>
</center>

<script> 
	var clipboard = new Clipboard('#botao'); 
	clipboard.on('success', function(e){ 
		console.log(e);
	}); 
	clipboard.on('error', function(e){ 
		console.log(e);
	});
</script>
</body>
</html>

