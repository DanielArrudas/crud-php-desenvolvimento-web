<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="views/css/index.css">
</head>

<body>
    <main class="content">
        <h1>Lista de Clientes</h1>

        <?php if (isset($mensagem)): ?>
            <p class="mensagem"><?= $mensagem ?></p>
        <?php endif; ?>
        
        <div>
            <form action="index.php" method="get">
                <button type="submit" name="action" value="create" class="btn-cadastrar">Cadastrar Novo Cliente</button>
            </form>
        </div>

        <?php if (empty($resultData)): ?>
            <h3 style="text-align: center; margin-top: 2rem;">Nenhum cliente cadastrado.</h3>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Escolaridade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultData as $data): ?>
                        <?php
                        $escolaridadeFormatado = match ($data['escolaridade']) {
                            1 => 'Ensino Fundamental',
                            2 => 'Ensino Médio',
                            3 => 'Ensino Superior',
                            default => 'Inválida'
                        }
                        ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= htmlspecialchars($data['nome']) ?></td>
                            <td><?= htmlspecialchars($data['cpf']) ?></td>
                            <td><?= htmlspecialchars($data['telefone']) ?></td>
                            <td><?= htmlspecialchars($data['email']) ?></td>
                            <td><?= $escolaridadeFormatado ?></td>
                            <td class="acoes">
                                <form action="index.php?action=change&id=<?= $data['id'] ?>" method="post" style="display: inline;">
                                    <button type="submit">Alterar</button>
                                </form>
                                <form action="index.php?action=delete&id=<?= $data['id'] ?>" method="post" style="display: inline; margin-left: 5px;">
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>