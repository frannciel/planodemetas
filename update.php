<?php 

require 'controller.php';

$categoria 		= getPost("categoria");
$recurso 		= getPost("recurso"); 
$prazo			= getPost("prazo");
$prioridade 	= getPost("prioridade");
$valor			= valorToNumerico(getPost("valor"));
$quantidade 	= getPost("quantidade");
$descricao 		= getPost("descricao");
$observacao 	= getPost("observacao");
$meta			= getPost("meta");
$setor_id		= getPost("cod");

$dados = array($categoria, $recurso, $prazo, $prioridade, $valor, $quantidade, $descricao, $observacao, date("Y/m/d H:i:s"), $meta);
$meta  = Controller::updateMeta($dados);
if($meta){
	$r_totais = Controller::getTotal($setor_id);
	echo json_encode(array(
		Controller::getCategoria($categoria),
		Controller::getPrioridade($prioridade),
		Controller::getValor($r_totais[0]->valor),
		Controller::getValor($r_totais[1]->valor), 
		Controller::getValor($r_totais[1]->valor + $r_totais[0]->valor)
		)
	);
}

/*
* param $valor Valor em formato string
* return $valor em formato decimal
*/
function valorToNumerico($valor){
	if(preg_replace("/[^0-9\s]/", "", $valor) > 0){
		$valor = str_replace(".", "", $valor);
		$valor = str_replace(",", '.', $valor);
	} else{
		$valor = 0;
	}
	return $valor;
}


/*
* FUnção que retorno os dados recebidos via POST se exixtir
* paran $valor  Nome do campo
* return Valor do campo recebido via post
*/
function getPost($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}
?>
