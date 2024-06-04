<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Contato</title>
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
        <section class="contato">
            <div class="contato-div">
                <div>
                    <p>telefone</p>
                    <h2>0800-666-1tapa na oreia</h2>
                </div>
                <div>
                    <p>email</p>
                    <h3>algauer.henrique@gmail.com</h3>
                    <h3>gabrielsantoscamargo8@gmail.com</h3>
                </div>
            </div>
            <div class="contato-div blur">
                <label for="nome">Nome</label>
                <input placeholder="nome" class="input" name="nome" type="text">

                <label for="email">Email</label>
                <input placeholder="email" class="input" name="email" type="email">

                <label for="msg">Mensagem</label>
                <textarea rows="5" class="input area" name="msg" placeholder="mensagem"></textarea>
                <button class="botao" disabled>ENVIAR</button>
            </div>
        </section>
        <section>
            <div class="dev-container">
                <div class="dev-box blur">
                    <h3 class="dev-name">Henrique Machado Algauer</h3>
                    <img class="dev-img" src="<?=ROOT?>/assets/img/dev2.jpg" alt="" />
                    <div class="dev-git">
                        <img src="<?=ROOT?>/assets/img/git.png" alt="" />
                        <a target="_blank" href="https://github.com/henriquealgauer">GitHub</a>
                    </div>
                </div>
                <div class="dev-box blur">
                    <h3 class="dev-name">Gabriel Santos Camargo</h3>
                    <img class="dev-img" src="<?=ROOT?>/assets/img/dev1.jpeg" alt="" />
                    <div class="dev-git">
                        <img src="<?=ROOT?>/assets/img/git.png" alt="" />
                        <a target="_blank" href="https://github.com/Gabriel-S-camargo">GitHub</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?=footer()?>
</body>

</html>

<?php 

    