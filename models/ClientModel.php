<?php

require_once './configuration/connect.php';

class ClientModel extends Connect
{
    private $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'clients';
    }
    public function getAll(): array
    {
        $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
        $resultQuery = $sqlSelect->fetchAll();
        return $resultQuery;
    }
    public function isCPFValide($cpf): bool
    {
        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }
    public function save($formData): array
    {
        $erros = [];
        if (!$this->isCPFValide($formData['cpf'])) {
            $erros['cpf'] = 'O CPF informado é inválido.';
        }
        if (strlen($formData['telefone']) != 11) {
            $erros['telefone'] = 'O telefone informado é inválido.';
        }
        if (!empty($erros)) {
            return $erros;
        }
        $formData['escolaridade'] = (int) $formData['escolaridade'];
        $query = "
        INSERT INTO $this->table (nome, cpf, telefone, email, escolaridade)
        VALUES (:nome, :cpf, :telefone, :email, :escolaridade);
        ";

        try {
            $sqlInsert = $this->connection->prepare($query);
            $sqlInsert->execute($formData);
            return [];
        } catch (PDOException $e) {
            return ['db_error' => 'Ocorreu um erro ao salvar os dados no servidor.'];
        }
    }
}