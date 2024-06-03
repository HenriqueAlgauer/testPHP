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
        <div class="interacoes">

            <br><br>
            <a href="<?=ROOT?>/produto">Clique aqui para acessar a tela de produtos</a>

            <br><br>
            <a href="<?=ROOT?>/venda">Clique aqui para acessar a tela de Vendas</a>

            <br><br>
            <a href="<?=ROOT?>/financeiros">Clique aqui para acessar a tela de Financeiro</a>
        </div>
    </main>

    <?=footer()?>
</body>

</html>

<?php 

    