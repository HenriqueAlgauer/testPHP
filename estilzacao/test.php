<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./src/css/home.css" />
    <link rel="stylesheet" href="./src/css/style.css" />

    <!-- <link
      rel="shortcut icon"
      href="#/assets/img/php3d.png"
      type="image/x-icon"
    /> -->
    <title>Login</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" /> -->
</head>

<body>
    <h1>Tela login</h1>
    <form method="post">
        <!-- <?php if(!empty($errors)):?>
        <div>
            <?php echo implode("<br>", $errors)?>
        </div>
        <?php endif;?> -->
        <label for="login">Login:</label><br />
        <input type="text" id="login" name="login" maxlength="20" /><br /><br />

        <label for="senha">Senha:</label><br />
        <input type="password" id="senha" name="senha" /><br /><br />

        <button class="btn btn-primary" type="submit">Login</button>
        <!-- <?php if (isset($error)) { echo "<p>$error</p>"; } ?> -->

        <div>
            <input type="checkbox" value="1" name="lembrar" id="lembrar" />Lembrar
            senha
        </div>

        <a href="#">Home</a>
        <a href="#/register">Cadastre-se</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>