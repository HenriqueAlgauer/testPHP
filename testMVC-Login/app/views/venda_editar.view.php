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
            <h1>Venda Editar</h1>
        </div>
        <br><br>
        <div class="internalNav">
            <a href="<?=ROOT?>/venda">Voltar pagina</a>
        </div>

        <br><br>

        <form method="post">
        <label for="nomeProduto">Forma De Pagamento</label><br>
        <select style='max-width:120px' class="form-select" name="formaPagamento" id="formaPagamento" value="<?$venda->formaPagamento?>"
                        aria-label="Default select example">
                        <option value="credito">Credito</option>
                        <option value="debito">Debito</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>

            <button type="submit">Enviar Alterações</button>
        </form>
    </main>

    <?=footer()?>

</body>

</html>