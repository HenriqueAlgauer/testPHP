<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto w-50 shadow rounded">
        <div class="text-center p-5">
            <h1>Excluir produto</h2>
        </div>
        <div class="d-flex justify-content-center">
            <form class="w-50 d-flex flex-column align-items-center" method="POST">
                <span class="text-center">Deseja realmente <strong>EXCLUIR</strong> esse produto?</span>
                <div class="my-5 d-flex gap-5 flex-start">
                    <div class="form-check">
                        <label class="form-check-label" for="opcao0">Sim</label>
                        <input class="form-check-input" type="radio" name="opcao" id="opcao" value="0">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="opcao0">Não</label>
                        <input class="form-check-input" type="radio" name="opcao" id="opcao" value="1">
                    </div>
                </div>
                <button class="btn btn-primary " type="submit">Enviar</button>
            </form>
        </div>

    </main>
    <a class="mx-auto my-5" href="<?=ROOT?>/produto">Voltar pagina</a>

    <?=footer()?>
</body>

</html>