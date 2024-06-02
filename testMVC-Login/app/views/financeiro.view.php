<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Financeiro</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>


<body class="container">
    <?= menu() ?>
    <main class="mx-auto">
        <div class="text-center p-5">
            <h1>Financeiro</h1>
        </div>

        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php } ?>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <form method="post" action="<?= ROOT ?>/financeiros">
                    <div class="input-group mb-3">
                        <input type="search" placeholder="procure" id="buscarFin" name="buscaFin" aria-label="Recipient's username" aria-describedby="button-addon2" class='form-control'>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-success" href="<?= ROOT ?>/financeiro_adicionar
                " id="botao" class="">Adicionar débito</a>
            </div>
        </div>

        <table id='tabela' class="table table-hover">
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
                            <td><?php echo $financeiros->valor; ?></td>
                            <td><?php echo $financeiros->data; ?></td>
                            <td colspan="2">
                                <div class="d-flex justify-content-around">
                                    <form method="post" action="<?= ROOT ?>/financeiros#tabela">
                                        <input type="hidden" name="id" value="<?= $financeiros->id ?>">
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" name="id_edit" value="<?= $financeiros->id ?>">
                                        <button type="submit" class="btn btn-primary">Editar</button>
                                    </form>
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