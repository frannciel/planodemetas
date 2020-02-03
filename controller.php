<?php

require_once dirname(__FILE__).'/bd/conexao.php';

class Controller {

    private static $PDO;

    private function __construct() {
       
    }

    public static function setConexao(){
        self::$PDO = Conexao::getInstance();
    }

    public static function getTotal($setorId){
        self::setConexao();
        $sql = self::$PDO->query("SELECT SUM(valor) as valor FROM metas WHERE setor_id ='".$setorId."' AND recurso = 0 AND metas.data > '2020-01-01 00:00:00'");
        $total1 = $sql->fetch(PDO::FETCH_OBJ);
        $sql = self::$PDO->query("SELECT SUM(valor)  as valor FROM metas WHERE setor_id ='".$setorId."' AND recurso = 1 AND metas.data > '2020-01-01 00:00:00'");
        $total2= $sql->fetch(PDO::FETCH_OBJ);
        return array($total1, $total2);
    }

    public static function apagarMeta($metaId){
        self::setConexao();
        $delete = self::$PDO->prepare('DELETE FROM metas WHERE id = :id');
        $delete->execute(['id' => $metaId]);
    }

    /**
     * Gets the setores.
     *
     * @return     <Object>  The setores.
     */
    public static function getSetores(){
        self::setConexao();
        $sql = self::$PDO->query("SELECT * FROM setores");
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
  	/**
  	 * Gets the todas metas.
  	 *
  	 * @return     <Array>  The todas metas.
  	 */
    public static function getMetas(){
    	self::setConexao();
    	$param = func_get_args();
        $query = "SELECT setores.id as setor_id, setores.nome as setor_nome, metas.id, metas.descricao, metas.observacao, metas.categoria, metas.prazo, metas.prioridade, metas.quantidade, metas.recurso, metas.valor 
       	FROM metas INNER JOIN setores ON metas.setor_id = setores.id";

        if ((isset($param[0]) && $param[0] != "") || (isset($param[2]) &&  $param[2] != "")) {
        	$query .= " WHERE ";
        }

        if (isset($param[2]) && $param[2] != "") {
        	$query .= "categoria = '".$param[2]."'";
        }

        if (isset($param[0], $param[2]) && $param[0] != "" && $param[2] != "") {
        	$query .= " AND ";
        }

        if (isset($param[0]) && $param[0] != "") {
        	$query .= "setor_id = '".$param[0]."'";
        }
        
        $query .= "AND metas.data > '2020-01-01 00:00:00'";

        if (isset($param[1]) && $param[1] != "") {
        	$query .= " ORDER BY ".$param[1];
        }
        
        $sql = self::$PDO->query($query);
        return $sql->fetchAll(PDO::FETCH_OBJ);

    }

    public static function getSetor($id){
        self::setConexao();
        $sql = self::$PDO->query("SELECT * FROM setores WHERE id ='".$id."'");
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public static function setMeta($request) {
    	self::setConexao();
        try {
            $sql = "INSERT INTO metas (setor_id, categoria, recurso, prazo, prioridade, valor, quantidade, descricao, observacao, data)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $conn = self::$PDO->prepare($sql);
            $conn->execute($request);
            return self::$PDO->lastInsertId();
        } catch (Exception $e) {
            print("Ocorreu ao tentar registrar salvar sua meta, favor entrar  com a CCL - Coordenação de Comprase Licitações");
            print($e->getMessage());
            return false;
        }
    }

    public static function updateMeta($request){
        self::setConexao();
        try {
            $query = 'UPDATE metas SET categoria=?, recurso=?, prazo=?, prioridade=?, valor=?, quantidade =?, descricao=?, observacao=?, data=?  WHERE id=?';
            $stmt = self::$PDO->prepare($query);
            $stmt->execute($request); 
            return true;
        } catch(PDOException $e) {
            print("Ocorreu ao tentar salvar, favor entrar em contato com o Administrador no Telefone (73)3281-2266");
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public static function getCategoria($param){
        switch ($param) {
            case '0':
            return 'Acervo';
            case '1':
            return 'Estrutura Física';
            case '2':
            return 'Equipamentos, Móveis e Veículos';
            case '3':
            return 'Gestão Organizacional';
            case '4':
            return 'Informatização';
            case '5':
            return 'Materiais';
            case '6':
            return 'Recursos Humanos';
            case '7':
            return 'Sustentabilidade';
            case '8':
            return 'Pesquisa';
            case '9':
            return 'Extensão';
            case '10':
            return' Assistência Estudantil';
            case '11':
            return 'Ensino - Geral ';
        }
    }

    public static function getRecurso($param){
        switch ($param) {
            case '0':
            return 'Orçamentário';
            case '1':
            return 'Não Orçamentário';
        }
    }

    public static function getDiretoria($param){
        switch ($param) {
            case 'DG':
            return 'Direção Geral';
            case 'DA':
            return 'Diretoria Acadêmica';
            case 'DAP':
            return 'Diretoria de Administração e Planejamento';
        }
    }

    public static function getPrazo($param){
        switch ($param) {
            case '0':
            return '1° Trimestre';
            case '1':
            return '2° Trimestre';
            case '2':
            return '3° Trimestre';
            case '3':
            return '4° Trimestre';
        }
    }

    public static function getPrioridade($param){
        switch ($param) {
            case '0':
            return 'Alta';
            case '1':
            return 'Média';
            case '2':
            return 'Baixa';
        }
    }

    public static function getValor($param){
        return number_format($param,2,",",".");
    }
}
?>
