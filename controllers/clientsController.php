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
            if ($_GET['status'] === 'updated') {
                $mensagem = 'Cliente atualizado com sucesso.';
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
    public function cleanFormData()
    {
        return [
            'nome' => $_POST['nome'],
            'cpf' => preg_replace('/\D/', '', $_POST['cpf']),
            'telefone' => preg_replace('/\D/', '', $_POST['telefone']),
            'email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            'escolaridade' => $_POST['escolaridade'],
        ];
    }
    public function store()
    {
        $formData = $this->cleanFormData();

        $erros = $this->model->save($formData);
        if (empty($erros)) {
            header('Location: index.php?action=GetAll&status=success');
            exit();
        } else {
            require_once 'views/formClient.php';
        }
    }
    public function change()
    {
        $resultClient = $this->model->getClientByID($_GET['id']);

        $opcoesEscolaridade = [
            1 => 'Ensino Fundamental',
            2 => 'Ensino Médio',
            3 => 'Ensino Superior',
        ];
        $escolaridadeAtualCliente = $resultClient['escolaridade'];

        require_once 'views/FormEditClient.php';
    }
    public function update()
    {
        $formData = $this->cleanFormData();
        $erros = $this->model->update($formData);
        if (empty($erros)) {
            header('Location: index.php?action=GetAll&status=updated');
            exit();
        } else {
            require_once 'views/formClient.php';
        }
    }
}