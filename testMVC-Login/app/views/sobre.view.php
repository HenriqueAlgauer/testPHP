<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Sobre</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/sobre.css" />
</head>

<body>
    <main class="main">
        <?=menu()?>
        <section class="hero">
            <div class="hero-title">
                <h1 class="h1-title">
                    Sobre <br />
                    o projeto
                </h1>
                <a class="blur" href="https://github.com/HenriqueAlgauer/projetoPHP">Repositório GitHub</a>
            </div>
            <div class="hero-img">
                <img src="<?=ROOT?>/assets/img/github.png" alt="" />
            </div>
        </section>
        <hr />

        <section class="func">
            <div>
                <h2 class="h2-title">FUNCIONALIDADES DO SISTEMA</h2>
            </div>
            <div id="container-func"></div>
        </section>
    </main>
    <footer id='footer'></footer>
    <script src="<?=ROOT?>/assets/js/menu.js"></script>
    <script src="<?=ROOT?>/assets/js/footer.js"></script>
    <script src="<?=ROOT?>/assets/js/contentBox.js"></script>
</body>

</html>