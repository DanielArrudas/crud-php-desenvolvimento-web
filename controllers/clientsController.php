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
            'escolaridade' => (int) $_POST['escolaridade'],
        ];
    }
    public function store()
    {
        $formData = $this->cleanFormData();

        $errors = $this->model->save($formData);
        if (empty($errors)) {
            header('Location: index.php?action=GetAll&status=success');
            exit();
        } else {
            require_once 'views/formClient.php';
        }
    }
    public function change(?array $errors = null)
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
        $formData['id'] = (int)$_GET['id'];
        $errors = $this->model->update($formData);
        if (empty($errors)) {
            header('Location: index.php?action=GetAll&status=updated');
            exit();
        } else {
            $this->change($errors);
        }
    }
    public function delete()
    {
        $errors = $this->model->delete($_GET['id']);
        if (empty($errors)) {
            header('Location: index.php?action=GetAll&status=deleted');
            exit();
        } else {
            header('Location: index.php?action=GetAll&status=error');
            exit();
        }
    }
}