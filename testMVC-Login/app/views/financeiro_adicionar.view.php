<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Adicionar débito</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto w-50 shadow rounded">
        <div class="text-center pt-5">
            <h1>Adicionar débito</h1>
        </div>

        <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
        </div>
        <?php } ?>
        <div class="p-5 d-flex justify-content-center">
            <form class="d-flex flex-column" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" for="nomeFinanceiro">Nome</span>
                    <input class="form-control" type="text" name="nome" id="nome">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" for="precoFinanceiro">Valor</span>
                    <input class="form-control" type="number" step="0.01" min="0" name="valor" id="valor">
                </div>
                <button class="mx-auto btn btn-success mt-4" type="submit">Adicionar débito</button>
            </form>
        </div>
    </main>
    <a class="mx-auto my-5" href="<?= ROOT ?>/financeiros">Voltar Pagina</a>

    <?= footer() ?>

</body>

</html>