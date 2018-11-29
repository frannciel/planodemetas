<?php 
require_once dirname(__FILE__).'/controller.php';

Controller::apagarMeta($_GET['cod']);

header("Location:./views/listarMetas.php?cod=".$_GET['setor']);

?>