<?php // PARTE SUPERIOR DA PAGINA HTML DEVENDO SER UTILIZADA EM CONJUNTO COM A PARTE INFERIOR ?>
<?php require_once dirname(__FILE__)."/../controller.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Plano Metas</title>
	<meta charset="utf-8">
   	<!-- Latest compiled and minified CSS -->
   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
   	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		.botao{
			font-size: 15px;
			font-weight: bolder;
			margin-top: 15px;
			color: #fff;
			margin-bottom:20px;
		}
		#linha{
			padding-top: 5%;
		}
		th {
			text-align: center;
		}
		#tabela-body {
			background: #fff;
		}
		#relatorio-num{
			vertical-align: top;
			text-align: center;
			font-weight: bolder;
		}
		.sombra{
			box-shadow: 0 1px 1px 0 rgba(0,0,0,0.06), 0 2px 5px 0 rgba(0,0,0,0.2);
			margin-top: 50px;
			margin-bottom: 50px;
		}
		body{
			background: #66CDAA;	
		}
		.alerta{
			position: fixed;
			display: none;
			font-weight: bold;
		}
	</style>
</head>
<body>
   <div class="container">
		<div class="content">
			<?php // NESTE LOCAL SERÁ INSERIDO O CORPO DA PÁGINA ATRAVÉS DE INCLUDES ?>
