<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Vendas</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto">
        <div class="text-center p-5">
            <h1>Vendas</h1>
        </div>
        <div class="p-5 shadow rounded">

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <form method="post" action="<?= ROOT ?>/venda">
                        <div class="input-group mb-3">
                            <input type="search" placeholder="digite id da Venda" id="buscarVenda" name="buscarVenda"
                                aria-label="Recipient's username" aria-describedby="button-addon2" class='form-control'>
                            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
                <div>
                    <a href="<?= ROOT ?>/venda_adicionar" id="botao" class="btn btn-success">Adicionar Venda</a>
                </div>
            </div>

            <table class="border table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID Venda</th>
                        <th scope="col">Forma de Pagamento</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Data Venda</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if (isset($vendas) ) {
                    foreach ($vendas as $venda) { ?>
                    <tr>
                        <td scope="row"><?php echo $venda->id; ?></td>
                        <td><?php echo $venda->formaPagamento; ?></td>
                        <td><?php echo $venda->valorTotal; ?></td>
                        <td><?php echo $venda->dataVenda; ?></td>
                        <td colspan="2">
                            <div class="d-flex justify-content-around">
                                <a href="<?= ROOT ?>/venda_editar?id=<?php echo $venda->id; ?>" id="botao"
                                    class="btn btn-primary">Editar</a>
                                <a href="<?= ROOT ?>/venda_excluir?id=<?php echo $venda->id; ?>" id="botao"
                                    class="btn btn-danger">Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php }
                } else {
                    echo 'Venda não encontrada';
                }
                ?>
                </tbody>
            </table>
        </div>

    </main>
    <a class="ms-5" href="<?= ROOT ?>/dashboard">Voltar página</a>

    <?= footer() ?>
</body>

</html>