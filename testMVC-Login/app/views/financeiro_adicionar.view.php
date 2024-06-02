<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>financeiro_adicionar</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <?= menu() ?>
    <main>

        <div class="blur">
            <h1>Financeiro Adicionar</h1>
        </div>
        <br><br>

        <a href="<?= ROOT ?>/financeiros">Voltar Pagina</a>

        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php } ?>

        <form method="post">
            <label for="nomeFinanceiro">Nome</label><br>
            <input type="text" name="nome" id="nome">
            <br><br>
            <label for="precoFinanceiro">Valor</label> <br>
            <input type="number" step="0.01" min="0" name="valor" id="valor">
            <br><br>
            <button type="submit">Enviar Alterações</button>
        </form>
    </main>

    <?= footer() ?>

</body>

</html>