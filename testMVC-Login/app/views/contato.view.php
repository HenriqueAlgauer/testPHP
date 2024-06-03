<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Home</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/contato.css" />
</head>

<body>
    <?=menuExterno()?>
    <main>
        <section class="hero">
            <div class="hero-title">
                <h1 class="h1-title">
                    Contato
                </h1>
            </div>
            <div class="hero-img">
                <img src="<?=ROOT?>/assets/img/ctt.png" alt="" />
            </div>
        </section>
        <hr />

        <h2 class="h2-title">0800-666-1tapa na oreia</h2>
        <section>
            <section>
                <h2 class="h2-title">Desenvolvedores</h2>
                <div class="dev-container">
                    <div class="dev-box blur">
                        <h3 class="dev-name">Henrique Machado Algauer</h3>
                        <img class="dev-img" src="<?=ROOT?>/assets/img/dev2.jpg" alt="" />
                        <div class="dev-git">
                            <img src="<?=ROOT?>/assets/img/git.png" alt="" />
                            <a href="https://github.com/henriquealgauer">GitHub</a>
                        </div>
                    </div>
                    <div class="dev-box blur">
                        <h3 class="dev-name">Gabriel Santos Camargo</h3>
                        <img class="dev-img" src="<?=ROOT?>/assets/img/dev1.jpeg" alt="" />
                        <div class="dev-git">
                            <img src="<?=ROOT?>/assets/git.png" alt="" />
                            <a href="https://github.com/Gabriel-S-camargo">GitHub</a>
                        </div>
                    </div>
                </div>
            </section>

        </section>


    </main>
    <?=footer()?>
</body>

</html>

<?php 

    