<?php

require_once './configuration/connect.php';

//essa classe faz as consultas, inserção, alteração no banco de dados
class ClientModel extends Connect
{
    private $table;

    public function __construct()
    {
        parent::__construct(); //abrindo conexão no banco de dados
        $this->table = 'clients';
    }
    public function getAll(): array
    {
        $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlSelect->fetchAll();
        return $resultQuery;
    }
}