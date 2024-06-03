<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="container">
    <?= menu() ?>
    <main class="mx-auto">
        <div class="text-center p-5">
            <h1>Dashboard</h1>
        </div>
        <div class="d-flex justify-content-center gap-5">

            <div class="shadow d-flex justify-content-around align-items-center rounded p-5 w-100">
                <img style="width: 50px;" src="<?=ROOT?>/assets/img/prod.png" alt="" />
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?=ROOT?>/produto">PRODUTOS
                </a>
            </div>
            <div class="shadow d-flex justify-content-around align-items-center rounded p-5 w-100">
                <img style="width: 50px;" src="<?=ROOT?>/assets/img/cart.png" alt="" />
                <a class="link-offset-2 link-underline link-underline-opacity-0" href="<?=ROOT?>/venda">VENDAS</a>
            </div>
            <div class="shadow d-flex justify-content-around align-items-center rounded p-5 w-100">
                <img style="width: 50px;" src="<?=ROOT?>/assets/img/fin.png" alt="" />
                <a class="link-offset-2 link-underline link-underline-opacity-0"
                    href="<?=ROOT?>/financeiros">FINANCEIRO</a>
            </div>
        </div>
    </main>

    <?=footer()?>
</body>

</html>

<?php 

    