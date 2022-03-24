<?php
error_reporting(E_ALL);
ini_set('display_erros',1);

class Conexao //singleton - design pattern
{
    //dados das variaveis abaixo ficam geralmente em um arquivo de configuracao (.ini ou .env)
    private $conexao;
    private $debug = true;
    private $driver = 'mysql';
    private $servidor = 'localhost';
    private $database = 'sistema-php';
    private $login = 'root';
    private $senha = '1234';
    private static $db = null;

    private function __construct()
    {
        try{
            switch($this->driver){
                case 'sqlite': 
                    $this->conexao = new PDO("sqlite:". $this->servidor . $this->database);
                    break;
                
                case 'mysql': 
                    $this->conexao = new PDO("mysql:host=$this->servidor;dbname=$this->database;", $this->login, $this->senha);
                    break;
            }
            if($this->debug) $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo 'Estamos em manutenção no banco de dados, volte mais tarde';
            if($this->debug) echo '<br />' . $e->getMessage();
        }
        
    }

    private function __clone()
    {

    }

    public static function getInstancia()
    {
        if(self::$db == null) self::$db = new Conexao();
        return self::$db;
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}