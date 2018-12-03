<?php

Conexao::getInstance();

class Conexao {

    public static $instance;

    private function __construct() {}

    public static function getInstance() {
        try{
            if (!isset(self::$instance)) {

                $server     = 'localhost';
                $username   = 'root';
                $password   = '';
                $dbname     = 'pmi';


                /*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                $server = $url["host"];
                $username = $url["user"];
                $password = $url["pass"];
                $dbname  = substr($url["path"], 1);*/

                self::$instance = new PDO('mysql:host='.$server, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
                self::$instance->exec("CREATE DATABASE IF NOT EXISTS $dbname");
                self::$instance->query("use $dbname");
                $table = "setores";
                if (self::$instance->query("SHOW TABLES LIKE '$table'")->rowCount() < 1)
                   self::create_DB();
            }
            return self::$instance;
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    public static function create_DB (){
        try {
            $PDO = self::$instance;

            $sql = "CREATE TABLE IF NOT EXISTS setores (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                nome varchar(100) NOT NULL,
                diretoria VARCHAR(100) NOT NULL,
                chefia VARCHAR(100) NOT NULL,
                email VARCHAR(100),
                data TIMESTAMP
            )ENGINE=INNODB;";
            $PDO->exec($sql);

            $sql = "CREATE TABLE IF NOT EXISTS metas (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                setor_id INT UNSIGNED,
                categoria SMALLINT,
                recurso SMALLINT NOT NULL,
                prazo SMALLINT NOT NULL,
                prioridade SMALLINT NOT NULL,
                valor DECIMAL(10,2) NOT NULL, 
                quantidade INT NOT NULL,
                descricao VARCHAR(500),
                observacao VARCHAR(200),
                data TIMESTAMP,
                CONSTRAINT metas_setores_foreign FOREIGN KEY (setor_id) REFERENCES setores(id)
            ) ENGINE=INNODB;";
            $PDO->exec($sql);

        } catch (Exception $e) {
            echo 'ERROR ao criar tabelas: ' . $e->getMessage();
        }

    }
}
?>