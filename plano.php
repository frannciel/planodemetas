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
$setor_id		= getPost("setor");

/*
$dados = array(
	'setor_id' => $setor_id, 'categoria' => $categoria, 'recurso' => $recurso, 'prazo' => $prazo,  'prioridade' => $prioridade,
	'valor' => $valor, 'quantidade' => $quantidade,	'descricao' => $descricao, 'observacao' => $observacao, 'data' =>  date("Y/m/d H:i:s")
);*/

$dados = array($setor_id, $categoria, $recurso, $prazo, $prioridade, $valor, $quantidade, $descricao, $observacao, date("Y/m/d H:i:s"));
$meta  = Controller::setMeta($dados);
header("Location:./views/novaMeta.php?cod=".$setor_id);


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
