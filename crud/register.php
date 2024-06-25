<?php
require 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $message = 'Por favor, preencha todos os campos.';
    } else {
        // Verificar se o nome de usuário já existe
        $sql = 'SELECT * FROM users WHERE username = :username';
        $statement = $pdo->prepare($sql);
        $statement->execute([':username' => $username]);
        $user = $statement->fetch(PDO::FETCH_OBJ);

        if ($user) {
            $message = 'Nome de usuário já existe. Por favor, escolha outro.';
        } else {
            // Inserir novo usuário
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
            $statement = $pdo->prepare($sql);
            if ($statement->execute([':username' => $username, ':password' => $passwordHash])) {
                header("Location: login.php");
            } else {
                $message = 'Ocorreu um erro ao registrar. Por favor, tente novamente.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registrar</title>
</head>

<body>
    <h2>Registrar</h2>
    <?php if (!empty($message)): ?>
    <p><?= $message ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" name="username" id="username"><br><br>
        <label for="password">Senha:</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Registrar</button>
    </form>
</body>

</html>