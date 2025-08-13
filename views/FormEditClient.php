<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="views/css/index.css" />
    <title>Alteração de Cliente</title>
</head>

<body>
    <div class="content">
        <h1>Alterar</h1>
        <form action="index.php?action=update&id=<?= $resultClient['id'] ?>" method="post">
            <div>
                <input type="text" name="nome" class="inputs" placeholder="Digite seu Nome"
                    value="<?= $resultClient['nome'] ?>" required />
            </div>
            <div>
                <input type="text" name="cpf" class="inputs" placeholder="Digite seu CPF"
                    value="<?= $resultClient['cpf'] ?>" required />
            </div>
            <div>
                <input type="text" name="telefone" class="inputs" placeholder="Digite seu Telefone"
                    value="<?= $resultClient['telefone'] ?>" required />
            </div>
            <div>
                <input type="email" name="email" class="inputs" placeholder="Digite seu Email"
                    value="<?= $resultClient['email'] ?>" required />
            </div>

            <p>Escolaridade:</p>
            <div class="box-select">
                <?php foreach ($opcoesEscolaridade as $key => $opcao): ?>
                    <?php $checked = ($key === $escolaridadeAtualCliente) ? 'checked' : '';
                    ?>

                    <div>
                        <input type="radio" id="<?= $key ?>" value="<?= $key ?>" name="escolaridade" <?= $checked ?>
                            required />
                        <label for="<?= $key ?>"><?= $opcao ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit">Alterar</button>
        </form>
        <form action="index.php" method="get">
            <button type="submit">Voltar</button>
        </form>

        <?php if (!empty($errors)): ?>
            <div class="erros">
                <?php foreach ($errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>