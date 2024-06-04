<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Financeiro crédito</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>


<body class="container">
    <?= menu() ?>
    <main class="mx-auto">
        <div class="text-center p-5">
            <h1>Registros crédito</h1>
        </div>
        <div class="p-5 shadow rounded">
            <div class="d-flex justify-content-between align-items-center">
                <form method="post" action="<?= ROOT ?>/financeiro_credito">
                    <div class="input-group mb-3">
                        <input style="width: 300px;" type="search" placeholder="id da venda" id="buscarFin"
                            name="buscaFin" aria-label="Recipient's username" aria-describedby="button-addon2"
                            class='form-control'>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>


            <table id='tabela' class="border shadow-sm mt-3 table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if (isset($financeiro) && is_array($financeiro) && count($financeiro) > 0) {
                    foreach ($financeiro as $financeiros) { ?>
                    <tr>
                        <th scope="row"><strong><?php echo $financeiros->id; ?></strong></th>
                        <td><?php echo $financeiros->tipo; ?></td>
                        <td><?php echo $financeiros->nome; ?></td>
                        <td>R$<?php echo $financeiros->valor; ?></td>
                        <td><?php echo $financeiros->data; ?></td>
                    </tr>
                    <?php }
                } else {
                    echo "Nenhum produto encontrado.";
                }
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <a class="ms-5" href="<?= ROOT ?>/financeiros">Voltar página</a>

    <?= footer() ?>
</body>

</html>