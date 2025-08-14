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
                <div style="align-items: center;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Nome</th>
                            <th style="text-align: center;">CPF</th>
                            <th style="text-align: center;">Telefone</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Escolaridade</th>
                            <th style="text-align: center;">Ações</th>
                        </tr>
                    </thead>
                </div>
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
                            <td style="text-align: center;"><?= $data['id'] ?></td>
                            <td style="text-align: center;"><?= htmlspecialchars($data['nome']) ?></td>
                            <td style="text-align: center;" class="cpf"><?= htmlspecialchars($data['cpf']) ?></td>
                            <td style="text-align: center;" class="telefone"><?= htmlspecialchars($data['telefone']) ?></td>
                            <td style="text-align: center;"><?= htmlspecialchars($data['email']) ?></td>
                            <td style="text-align: center;"><?= $escolaridadeFormatado ?></td>
                            <td class="acoes">
                                <form action="index.php?action=change&id=<?= $data['id'] ?>" method="post"
                                    style="display: inline;">
                                    <button type="submit">Alterar</button>
                                </form>
                                <form action="index.php?action=delete&id=<?= $data['id'] ?>" method="post"
                                    style="display: inline; margin-left: 5px;" class="formDelete" id="formDelete">
                                    <button class="btn-delete" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('.cpf').mask('000.000.000-00', { reverse: true });
        $('.telefone').mask('(00) 00000-0000');

        document.querySelectorAll(".btn-delete").forEach(el => {
            el.addEventListener("click", function (e) {
                e.preventDefault();
                if (confirm('Tem certeza que deseja deletar esse cliente?')) {
                    this.parentNode.submit();
                }
            });
        });
    </script>
</body>

</html>