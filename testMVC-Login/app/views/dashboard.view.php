<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" />
</head>

<body>
    <main>
        <?=menu()?>
        <h1>Dashboard</h1>
        <div class="interacoes">

            <br><br>
            <a href="<?=ROOT?>/produto">Clique aqui para acessar a tela de produtos</a>

            <br><br>
            <a href="<?=ROOT?>/venda">Clique aqui para acessar a tela de Vendas</a>

            <br><br>
            <a href="<?=ROOT?>/financeiro">Clique aqui para acessar a tela de Financeiro</a>
        </div>
    </main>


    <footer id='footer'></footer>
    <script src="<?=ROOT?>/assets/js/menu.js"></script>
    <script src="<?=ROOT?>/assets/js/footer.js"></script>
</body>

</html>

<?php 

    