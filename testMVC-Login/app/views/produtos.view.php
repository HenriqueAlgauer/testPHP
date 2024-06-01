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
            <h1>Produtos</h1>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form method="post" action="<?= ROOT ?>/produto">
                    <div class="input-group mb-3">
                        <input type="search" placeholder="digite produto" id="buscarProduto" name="buscarProduto"
                            aria-label="Recipient's username" aria-describedby="button-addon2" class='form-control'>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= ROOT ?>/produto_adicionar" id="botao" class="">Adicionar
                    Produto</a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($produtos) && is_array($produtos) && count($produtos) > 0) {
                    foreach ($produtos as $produto) { ?>
                <tr>
                    <th scope="row"><strong><?php echo $produto->id; ?></strong></th>
                    <td><?php echo $produto->nome; ?></td>
                    <td><?php echo $produto->preco; ?></td>
                    <td><?php echo $produto->estoque; ?></td>
                    <td colspan="2">
                        <div class="d-flex justify-content-between">
                            <a href="<?= ROOT ?>/produto_editar?id=<?php echo $produto->id; ?>" id="botao"
                                class="btn btn-primary">Editar</a>
                            <a href="<?= ROOT ?>/produto_excluir?id=<?php echo $produto->id; ?>" id="botao"
                                class="btn btn-danger">Excluir</a>
                        </div>
                    </td>
                </tr>
                <?php }
                } else {
                    echo "Nenhum produto encontrado.";
                }
                ?>
            </tbody>
        </table>
        <a href="<?= ROOT ?>/dashboard">Voltar para dashboard</a>
    </main>

    <?= footer() ?>
</body>

</html>