<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=ROOT?>/assets/img/php3d.png" type="image/x-icon" />
    <title>Login</title>
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/reset.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/home.css" />
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/style.css" /> -->
</head>

<body>
    <h1>Tela login</h1>
    <form action="process_user.php" method="POST">
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" maxlength="20"><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    <footer id='footer'></footer>
</body>

</html>