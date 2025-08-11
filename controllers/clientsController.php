<?php

require_once './models/ClientModel.php';

class ClientsController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();
    }
    public function getAll()
    {
        $mensagem = null;

        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                $mensagem = 'Cliente salvo com sucesso.';
            }
            if ($_GET['status'] === 'deleted') {
                $mensagem = 'Cliente deletado com sucesso.';
            }
            if ($_GET['status'] === 'error') {
                $mensagem = 'Ocorreu um falha ao processar a solicitação.';
            }
        }

        $resultData = $this->model->getAll();
        require_once 'views/ListClients.php';
    }
    public function create()
    {
        require_once 'views/formClient.php';
    }
    public function store()
    {
        $formData = [
            'nome' => $_POST['nome'],
            'cpf' => preg_replace('/\D/', '', $_POST['cpf']),
            'telefone' => preg_replace('/\D/', '', $_POST['telefone']),
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'escolaridade' => $_POST['escolaridade'],
        ];
        $erros = $this->model->save($formData);
        if (empty($erros)) {
            header('Location: index.php?action=GetAll&status=success');
            exit();
        } else {
            require_once 'views/formClient.php';
        }
    }
}