<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Editar venda</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto w-50 shadow rounded">
        <div class="text-center pt-5">
            <h1>Editar venda</h1>
        </div>
        <div class="p-5 d-flex justify-content-center">
            <form class="d-flex flex-column align-items-center justify-content-center" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" for="nomeProduto">Forma De Pagamento</span>
                    <select class="form-select" name="formaPagamento" id="formaPagamento"
                        value="<?$venda->formaPagamento?>" aria-label="Default select example">
                        <option value="credito">Credito</option>
                        <option value="debito">Debito</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>

                <button class="mx-auto btn btn-success mt-4" type="submit">Aplicar Alterações</button>
            </form>
        </div>
    </main>
    <a class="mx-auto my-5" href="<?=ROOT?>/venda">Voltar página</a>
    <?=footer()?>
</body>

</html>