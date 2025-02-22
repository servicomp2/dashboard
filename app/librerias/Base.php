<?php

class Base
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $database = DB_DATA;
    private $port = DB_PORT;

    private $handler;
    private $statement;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:dbname='.$this->database.';host='.$this->host.';port'.$this->port;
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->handler = new PDO($dsn, $this->user, $this->pass, $opciones);
            $this->handler->exec('set names utf8');
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->statement = $this->handler->prepare($sql);
    }

    public function bind($parametro, $valor, $tipo = null)
    {
        if(is_null($tipo))
        {
            switch(true){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                    break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                    break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                    break;
                default:
                    $tipo = PDO::PARAM_STR;
                    break;
            }
        }
        $this->statement->bindValue($parametro, $valor, $tipo);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function fetchArray()
    {
        $this->statement->execute();
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function rowsCount()
    {
        $this->execute();
        return $this->statement->rowCount();
    }
}