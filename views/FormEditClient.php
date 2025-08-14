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
                <input type="text" name="nome" id="nome" class="inputs" placeholder="Digite seu Nome"
                    value="<?= $resultClient['nome'] ?>" required />
            </div>
            <div>
                <input type="text" name="cpf" id="cpf" class="inputs" placeholder="Digite seu CPF"
                    value="<?= $resultClient['cpf'] ?>" required />
            </div>
            <div>
                <input type="text" name="telefone" id="telefone" class="inputs" placeholder="Digite seu Telefone"
                    value="<?= $resultClient['telefone'] ?>" required />
            </div>
            <div>
                <input type="email" name="email" id="email" class="inputs" placeholder="Digite seu Email"
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('#telefone').mask('(00) 00000-0000');
        $('#cpf').mask('000.000.000-00', { reverse: true });
    </script>
</body>

</html>