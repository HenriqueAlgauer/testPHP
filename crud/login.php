<?php
require 'db.php';
session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = 'Por favor, preencha todos os campos.';
    } else {
        $sql = 'SELECT * FROM users WHERE username = :username';
        $statement = $pdo->prepare($sql);
        $statement->execute([':username' => $username]);
        $user = $statement->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;

            if (!empty($_POST['remember'])) {
                setcookie('username', $username, time() + (10 * 365 * 24 * 60 * 60));
                setcookie('password', $password, time() + (10 * 365 * 24 * 60 * 60));
            } else {
                setcookie('username', '');
                setcookie('password', '');
            }

            header("Location: dashboard.php");
        } else {
            $message = 'Login inválido. Por favor, tente novamente.';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" name="username" id="username"
            value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>"><br><br>
        <label for="password">Senha:</label><br>
        <input type="password" name="password" id="password"
            value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>"><br><br>
        <input type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) { ?> checked <?php } ?> />
        Lembrar-me<br><br>
        <button type="submit">Login</button>
    </form>
    <br>
    <a href="register.php">Registrar</a>
</body>

</html>