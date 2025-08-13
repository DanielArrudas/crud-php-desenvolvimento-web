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
    public function isCPFValide(string $cpf): bool
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

    public function verifyErrors($formData): array
    {
        $errors = [];
        if (!$this->isCPFValide($formData['cpf'])) {
            $errors['cpf'] = 'O CPF informado é inválido.';
        }
        if (strlen($formData['telefone']) != 11) {
            $errors['telefone'] = 'O telefone informado é inválido.';
        }
        return $errors;
    }
    public function issetCPF(string $cpf)
    {
        $sqlCpf = $this->connection->query("SELECT * FROM $this->table WHERE cpf = '$cpf'");
        $resultQuery = $sqlCpf->fetch();
        return $resultQuery;
    }
    public function issetEmail(string $email)
    {
        $sqlEmail = $this->connection->query("SELECT * FROM $this->table WHERE email = '$email'");
        $resultQuery = $sqlEmail->fetch();
        return $resultQuery;
    }
    public function save(array $formData): array
    {
        $errors = $this->verifyErrors($formData);
        if($this->issetCPF($formData['cpf'])) {
            $errors['cpfExists'] = 'O CPF informado já existe.';   
        }
        if($this->issetEmail($formData['email'])) {
            $errors['emailExists'] = 'O Email informado já existe.';   
        }
        if (!empty($errors)) {
            return $errors;
        }
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

    public function getClientByID(int $id)
    {
        $query = "
        SELECT * FROM $this->table
        WHERE id = $id
        ";
        $sqlSelect = $this->connection->query($query);
        $resultQuery = $sqlSelect->fetch();
        return $resultQuery;
    }
    public function update(array $formData)
    {
        $errors = $this->verifyErrors($formData);
        if (!empty($errors)) {
            return $errors;
        }
        $query = "
        UPDATE $this->table
        SET nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, escolaridade = :escolaridade
        WHERE id = :id
        ";

        try {
            $sqlInsert = $this->connection->prepare($query);
            $sqlInsert->execute($formData);
            return [];
        } catch (PDOException $e) {
            return ['db_error' => 'Ocorreu um erro ao atualizar os dados no servidor.'];
        }
    }
    public function delete(int $id)
    {
        $query = "
        DELETE FROM $this->table
        WHERE id = :id
        ";

        try {
            $sqlInsert = $this->connection->prepare($query);
            $sqlInsert->execute(['id' => $id]);
            return [];
        } catch (PDOException $e) {
            return ['db_error' => 'Ocorreu um erro ao atualizar os dados no servidor.'];
        }
    }
}