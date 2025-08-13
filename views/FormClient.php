<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Cliente</title>
</head>

<body>
    <div class="content">
        <h1>Cadastrar</h1>
        <form action="index.php?action=store" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" required />
            <label>CPF:</label>
            <input type="text" name="cpf" required />
            <label>Telefone:</label>
            <input type="text" name="telefone" required />
            <label>Email:</label>
            <input type="email" name="email" required />

            <label>Escolaridade:</label>
            <select name="escolaridade" required>
                <option value="" disabled selected>Selecione</option>
                <option value="1">Ensino Fundamental</option>
                <option value="2">Ensino Médio</option>
                <option value="3">Ensino Superior</option>
            </select>
            <button type="submit">Cadastrar</button>
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