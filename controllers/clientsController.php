<?php

require_once './models/ClientModel.php';

class ClientsController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel(); //recebe a instancia da model
    }
    //controller nunca mexe com os dados no db, sempre a model
    public function getAll()
    {
        $resultData = $this->model->getAll();
        require_once './views/ListClients.php';
    }
}