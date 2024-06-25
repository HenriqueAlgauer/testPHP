<?php
require 'db.php';

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

        if ($user) {
            $message = 'Nome de usuário já existe. Por favor, escolha outro.';
        } else {
            
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