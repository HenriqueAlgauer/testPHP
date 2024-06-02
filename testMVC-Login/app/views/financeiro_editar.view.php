<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
</head>

<body>
    <?=menu()?>
    <main>

        <div class="blur">
            <h1>Financeiro Editar</h1>
        </div>
        <br><br>

        <form method="post">
            <label for="nomeFinanceiro">Nome</label><br>
            <input type="text" name="nome" id="nome" value="<?= $financeiro->nome ?>">
            <br><br>
            <label for="valorFinanceiro">Valor</label> <br>
            <input type="number" step="0.01" min="0" name="valor" id="valor" value="<?= $financeiro->valor ?>">

            <button type="submit">Enviar Alterações</button>
        </form>
    </main>

    <?=footer()?>

</body>

</html>