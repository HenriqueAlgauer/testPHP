<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Registrar</title>
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" /> -->
</head>

<body>
    <h1>Tela de registro</h1>
    <?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

    <form method="post">
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" maxlength="20"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input type="submit" value="Cadastrar">
        <a href="<?=ROOT?>">Home</a>
        <a href="<?=ROOT?>/login">Login</a>
    </form>
    <footer id='footer'></footer>
</body>

</html>