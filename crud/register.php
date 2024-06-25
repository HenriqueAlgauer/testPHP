<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
    $statement = $pdo->prepare($sql);
    if ($statement->execute([':username' => $username, ':password' => $password])) {
        header("Location: login.php");
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
    <form method="post">
        <label for="username">Nome de Usuário:</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Senha:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Registrar</button>
    </form>
</body>

</html>