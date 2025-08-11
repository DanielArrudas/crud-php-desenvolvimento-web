<?php

const SERVERNAME = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DBNAME = 'loja';

class Connect
{
    protected $connection;
    public function __construct()
    {
        $this->connectDatabase();
    }
    public function connectDatabase()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . SERVERNAME . ';dbname=' . DBNAME,
                USERNAME,
                PASSWORD,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou: " . $e->getMessage();
            die();
        }
    }
}