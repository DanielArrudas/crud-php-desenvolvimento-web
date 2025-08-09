<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>

<body>
    <h1>Lista de Clientes</h1>

    <div class="content">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Escolaridade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultData as $data): ?>
                    <?php
                    $escolaridadeFormatado = match ($data['escolaridade']) {
                        1 => 'Ensino Fundamental',
                        2 => 'Ensino Médio',
                        3 => 'Ensino Superior',
                        default => 'Escolaridade Inválida'
                    }
                        ?>
                    <tr>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nome'] ?></td>
                        <td><?= $data['cpf'] ?></td>
                        <td><?= $data['telefone'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $escolaridadeFormatado ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

</html>