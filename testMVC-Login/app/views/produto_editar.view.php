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
    <main class="mx-auto">
        <div class="text-center p-5">
            <h1>Produtos Editar</h1>
        </div>
        <div class="p-5 d-flex justify-content-center">
            <form class=" w-50 d-flex flex-column" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" for="nomeProduto" id="basic-addon1">Nome</span>
                    <input class="form-control" aria-describedby="basic-addon1" type="text" name="nome" id="nome"
                        value="<?= $produto->nome ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" for="nomeProduto" id="basic-addon1">Preço</span>
                    <input class="form-control" aria-describedby="basic-addon1" type="number" step="0.01" min="0"
                        name="preco" id="preco" value="<?= $produto->preco ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" for="nomeProduto" id="basic-addon1">Estoque</span>
                    <input class="form-control" aria-describedby="basic-addon1" type="number" name="estoque"
                        id="estoque" value="<?= $produto->estoque ?>">
                </div>

                <button class="mx-auto btn btn-success" type="submit">Aplicar Alterações</button>
            </form>
        </div>
        <a href="<?=ROOT?>/produto">Voltar pagina</a>
    </main>
    <?=footer()?>

</body>

</html>