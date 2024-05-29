<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= ROOT ?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/style.css" />
</head>

<body>
    <main>
        <?=menu()?>

        <div class="blur">
            <h1>Produtos Excluir</h1>
        </div>
        <br><br>
        <div class="internalNav">
            <form method="post" action="<?= ROOT ?>/produto">
                <input type="search" placeholder="digite produto" id="buscarProduto" name="buscarProduto">
                <button type="submit">Buscar</button>
            </form>
            <button type="submit">Adicionar Produto</button>

            <?php show($value)?>
        </div>
    </main>


    <footer id='footer'></footer>
    <script src="<?= ROOT ?>/assets/js/menu.js"></script>
    <script src="<?= ROOT ?>/assets/js/footer.js"></script>
</body>

</html>