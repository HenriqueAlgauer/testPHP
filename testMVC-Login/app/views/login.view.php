<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Login</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" />
</head>

<body>
    <h1>Tela login</h1>
    <form method="post">
        <?php if(!empty($errors)):?>
        <div>
            <?php echo implode("<br>", $errors)?>
        </div>
        <?php endif;?>
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" maxlength="20"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <button type="submit">Login</button>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>

        <div>
            <input type="checkbox" value="1" name="lembrar" id="lembrar">Lembrar senha
        </div>

        <a href="<?=ROOT?>">Home</a>
        <a href="<?=ROOT?>/register">Cadastre-se</a>
    </form>
    <?=footer()?>
</body>

</html>