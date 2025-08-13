<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alteração de Cliente</title>
</head>

<body>
    <div class="content">
        <h1>Alterar</h1>
        <form action="index.php?action=update&id=<?= $resultClient['id'] ?>" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $resultClient['nome'] ?>" required />
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?= $resultClient['cpf'] ?>" required />
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= $resultClient['telefone'] ?>" required />
            <label>Email:</label>
            <input type="email" name="email" value="<?= $resultClient['email'] ?>" required />

            <label>Escolaridade:</label>
            <select name="escolaridade" required>
                <option value="" disabled>Selecione</option>
                <?php foreach ($opcoesEscolaridade as $key => $opcao): ?>
                    <?php $selecionado = ($key === $escolaridadeAtualCliente) ? 'selected' : ''; ?>
                    <option value="<?= $key ?>" <?= $selecionado ?>><?= $opcao ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Alterar</button>
        </form>
        <form action="index.php" method="get">
            <button type="submit">Visualizar Clientes</button>
        </form>
    </div>
    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>