<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="views/css/index.css" />
    <title>Cadastro de Cliente</title>
</head>

<body>
    <div class="content">
        <h1>Cadastrar</h1>
        <form action="index.php?action=store" method="post">
            <div>
                <input type="text" name="nome" id="nome" class="inputs" placeholder="Digite seu Nome" required />
            </div>
            <div>
                <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" class="inputs" required />
            </div>
            <div>
                <input type="text" name="telefone" id="telefone" placeholder="Digite seu Telefone" class="inputs"
                    required />
            </div>
            <div>
                <input type="email" name="email" id="email" placeholder="Digite seu Email" class="inputs" required />
            </div>

            <p>Escolaridade:</p>
            <div class="box-select">
                <div>
                    <input type="radio" id="1" value="1" name="escolaridade" required />
                    <label for="1">Ensino Fundamental</label>
                </div>
                <div>
                    <input type="radio" id="2" value="2" name="escolaridade" required />
                    <label for="2">Ensino Médio</label>
                </div>
                <div>
                    <input type="radio" id="3" value="3" name="escolaridade" required />
                    <label for="3">Ensino Superior</label>
                </div>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
        <form action="index.php" method="get">
            <button type="submit">Visualizar Clientes</button>
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